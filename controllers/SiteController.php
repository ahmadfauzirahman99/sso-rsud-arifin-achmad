<?php

namespace app\controllers;

use app\components\Auth;
use app\components\HelperSso;
use app\components\TipeAkun;
use app\models\Absensi;
use app\models\Aplikasi;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\TbPegawai;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
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
                        'actions' => [
                            'logout',
                            'index',
                            'create',
                            'update',
                            'view',
                            'delete',
                            'absen',
                            'absen-keluar',
                            'list-absensi',
                        ],
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

        $hak = Yii::$app->user->identity->roles;
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

        if (in_array(Yii::$app->user->identity->kodeAkun, $nip_khusus)) {
            $aplikasi = Aplikasi::find()->where(['in', 'inf', TipeAkun::HakAksesKhusus[$hak]])->orderBy('inf ASC')->all();
        } else {
            $aplikasi = Aplikasi::find()->where(['in', 'inf', TipeAkun::HakAkses[$hak]])->orderBy('inf ASC')->all();
        }
        $pegawaiSaya = HelperSso::getDataPegawaiByNip(Yii::$app->user->identity->idData);

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

    public function actionAbsen()
    {
        // if ($id) {


        $id = $_POST['id'];
        $pegawai = TbPegawai::findOne(['pegawai_id' => $id]);
        date_default_timezone_set("Asia/Jakarta");

        // if (is_null($absen)) {
        $absen = new Absensi();
        $absen->id_pegawai = $pegawai->pegawai_id;
        $absen->nip_nik = $pegawai->id_nip_nrp;
        $absen->jam_masuk = date('H:i:s');
        $absen->jam_keluar = "";
        $absen->tanggal_masuk = date('Y-m-d');
        $absen->lat = '0.5233203';
        $absen->long = '101.451869';
        $absen->status = "h";
        $absen->how = "Web";

        if ($absen->save(false)) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            return [
                's' => true,
                'e' => null
            ];
        } else {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            return [
                's' => false,
                'e' => $absen->errors
            ];
        }
    }

    public function actionAbsenKeluar()
    {
        $id = $_POST['id'];
        $absen = Absensi::find()->where(['id_pegawai' => $id])->andWhere(['tanggal_masuk' => date("Y-m-d")])->one();
        date_default_timezone_set("Asia/Jakarta");

        if ($absen) {
            $absen->jam_keluar = date('H:i:s');
            if ($absen->save(false)) {
                \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

                return [
                    's' => true,
                    'e' => null
                ];
            } else {
                \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

                return [
                    's' => false,
                    'e' => $absen->errors
                ];
            }
        } else {
            return [
                's' => false,
                'e' => null
            ];
        }
    }

    public function actionListAbsensi()
    {

        $googleCalander = new HelperSso();
        date_default_timezone_set("Asia/Jakarta");

        $hari_kerja = ['Sat', 'Sun'];

        $absensi = TbPegawai::find()
            ->where(['id_nip_nrp' => Yii::$app->user->identity->kodeAkun])
            ->all();
        $absensis = [];

      
        $d = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
        $hariLiburNasional = $googleCalander->cekNationalFreeDay();
      
        foreach ($absensi as $data) {
            for ($i = 1; $i <= $d; $i++) {
                $tanggal = strlen($i) ==  2 ? date('Y-m-' . $i) : date('Y-m-' . "0" . $i);
                $dHari = date('D', strtotime($tanggal));


                if ($i < 10) {
                    $n =  '0' . $i;
                } else {
                    $n = $i;
                }
                $absen_masuk_pegawai = Absensi::find()
                    ->where(['=', 'tanggal_masuk', date('Y-m-') . $n])
                    ->andWhere(['nip_nik' => Yii::$app->user->identity->kodeAkun])
                    ->orderBy(['id_tb_absensi' => SORT_ASC])
                    ->one();

                if ($absen_masuk_pegawai != null) {
                    $absensis[$data->pegawai_id]['absensi'][$i]['kehadiran'] = "<span style='color:green;'>H</span>";
                } elseif (in_array($tanggal, $hariLiburNasional)) {
                    $absensis[$data->pegawai_id]['absensi'][$i]['kehadiran'] = "<span style='color:red;'>LN</span>";
                } elseif (in_array($dHari, $hari_kerja)) {
                    $absensis[$data->pegawai_id]['absensi'][$i]['kehadiran'] = "<span style='color:red;'>L</span>";
                } else {
                    $absensis[$data->pegawai_id]['absensi'][$i]['kehadiran'] = "<span style='color:blue;'></span>";
                }
            }
        }


        // exit();

        return $this->render('list-absensi', [
            'absensis' => $absensis,
          
        ]);
    }
}
