<?php

namespace app\controllers;

use app\components\Auth;
use app\components\HelperSso;
use app\components\TipeAkun;
use app\models\Aplikasi;
use app\models\RiwayatPenempatan;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
	/**
	 * {@inheritdoc}
	 */
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'rules' => [
					[
						'actions' => ['login', 'error'],
						'allow' => true,
					],
					[
						'actions' => ['logout', 'index', 'create', 'update', 'view', 'delete','about'],
						'allow' => true,
						'roles' => ['@'],
					],
				],
			],
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
					'logout' => ['post'],
				],
			],
		];
	}


	/**
	 * {@inheritdoc}
	 */
	public function actions()
	{
		return [
			'error' => [
				'class' => 'yii\web\ErrorAction',
			],
			'captcha' => [
				'class' => 'yii\captcha\CaptchaAction',
				'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
			],
		];
	}

	/**
	 * Displays homepage.
	 *
	 * @return string
	 */
	public function actionIndex()
	{

		$hak = Yii::$app->user->identity->getRoles();
		$id = Yii::$app->user->identity->getId();
		$nip_khusus = [
			'197303092007012004',
			'2014171119850918262201',
			'1471116310890021',
			'198110192006041005',
			'197809132009031002',
			'1471110804830001',
			'196804161997031004',
			'2010022119880919120202',
			'198210202006042007',
			'198508072015032002',
			'2009036119761121260201'
		];

		if (in_array(Yii::$app->user->identity->getKodeAkun(), $nip_khusus)) {
			$aplikasi = Aplikasi::find()->where(['in', 'inf', TipeAkun::HakAksesKhusus[$hak]])->all();
		} else {
			$aplikasi = Aplikasi::find()->where(['in', 'inf', TipeAkun::HakAkses[$hak]])->all();

		}
		$pegawaiSaya = HelperSso::getDataPegawaiByNip(Yii::$app->user->identity->getKodeAkun());

		$log = HelperSso::getLogLogin($id);
		return $this->render('index', [
			'aplikasi' => $aplikasi,
			'pegawai' => $pegawaiSaya,
			'log' => $log
		]);
	}


	/**
	 * Login action.
	 *
	 * @return Response|string
	 */
	public function actionLogin()
	{

		$this->layout = 'main-login';
		if (!Yii::$app->user->isGuest) {
			return $this->goHome();
		}

		$model = new LoginForm();
		if ($model->load(Yii::$app->request->post()) && $model->login()) {
			return $this->goBack();
		}

		$model->password = '';
		return $this->render('login', [
			'model' => $model,
		]);
	}

	/**
	 * Logout action.
	 *
	 * @return Response
	 */
	public function actionLogout()
	{
		Yii::$app->user->logout();

		return $this->goHome();
	}

	/**
	 * Displays contact page.
	 *
	 * @return Response|string
	 */
	public function actionContact()
	{
		$model = new ContactForm();
		if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
			Yii::$app->session->setFlash('contactFormSubmitted');

			return $this->refresh();
		}
		return $this->render('contact', [
			'model' => $model,
		]);
	}

	/**
	 * Displays about page.
	 *
	 * @return string
	 */
	public function actionAbout()
	{
		return $this->render('about');
	}
}
