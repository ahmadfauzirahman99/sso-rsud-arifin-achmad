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
        $pegawaiSaya = HelperSso::getDataPegawaiByNip(Yii::$app->user->identity->kodeAkun);

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

    public function actionAbsen($id = null, $id_pegawai = null)
    {
        if ($id) {
            $absen = Absensi::find()->alias('a')
                ->leftJoin(TbPegawai::tableName() . " as tb", "a.nip_nik = tb.id_nip_nrp")
                ->where(["a.tanggal_masuk" => date("Y-m-d")])
                ->andWhere(['a.nip_nik' => $id])->asArray()->one();
            date_default_timezone_set("Asia/Jakarta");

            if (is_null($absen)) {
                $absen = new Absensi();
                $absen->id_pegawai = $id_pegawai;
                $absen->nip_nik = $id;
                $absen->jam_masuk = date('H:i:s');
                $absen->jam_keluar = "";
                $absen->tanggal_masuk = date('Y-m-d');
                $absen->lat = '0.5233203';
                $absen->long = '101.451869,15';
                $absen->status = "h";
                $absen->how = "Web";

                if ($absen->save()) {
                    Yii::$app->session->setFlash('success', 'Berhasil Mengambil Absen Selamat Datang :)');
                    return $this->redirect(['site/index']);
                } else {
                    Yii::$app->session->setFlash('danger', 'Tidak Berhasil Mengambil Absen Hubungi Edp :(');
                    return $this->redirect(['site/index']);
                }
            } else {
                $absen = Absensi::find()->alias('a')
                    ->where(["a.tanggal_masuk" => date("Y-m-d")])
                    ->andWhere(['a.nip_nik' => $id])->one();
                $absen->jam_keluar = date('H:i:s');
                if ($absen->save()) {
                    Yii::$app->session->setFlash('success', 'Berhasil Mengambil Absen Pulang Hati-Hati Dijalan Ya :)');
                    return $this->redirect(['site/index']);
                } else {
                    Yii::$app->session->setFlash('danger', 'Tidak Berhasil Mengambil Absen Hubungi Edp :(');
                    return $this->redirect(['site/index']);
                }
            }
        }
        Yii::$app->session->setFlash('danger', 'Tidak Berhasil');
    }

    public function actionListAbsensi()
    {

        $googleCalander = new HelperSso();
        date_default_timezone_set("Asia/Jakarta");
        // echo '<pre>';

        $list_libur_free_day = $googleCalander->cekNationalFreeDay();
        // var_dump($list_libur_free_day);

        $absensi = TbPegawai::find()
            ->where(['id_nip_nrp' => Yii::$app->user->identity->kodeAkun])
            ->all();
        $absensis = [];

        $totalMasuk = 0;
        $totalAlfa = 0;
        $totalSakit = 0;
        $totalCuti = 0;
        $d = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
        $hari_kerja = $googleCalander->getHariKerja($d);
        foreach ($hari_kerja  as $itemKerja) {
            var_dump($itemKerja);
        }
        exit;
        foreach ($absensi as $data) {
            for ($i = 1; $i <= $d; $i++) {
                // echo '<pre>';
                // var_dump($i);
                $absen_masuk_pegawai = Absensi::find()
                    ->where(['=', 'tanggal_masuk', date('Y-m-') . '0' . $i])
                    ->orderBy(['id_tb_absensi' => SORT_ASC])
                    ->one();

                if ($absen_masuk_pegawai != null) {
                    if ($absen_masuk_pegawai->status  ==  'h') {
                        $totalMasuk += 1;
                        $absensis[$data->pegawai_id]['absensi'][$i]['kehadiran'] = "Hadir";
                    } else if ($absen_masuk_pegawai->status  ==  's') {
                        $absensis[$data->pegawai_id]['absensi'][$i]['kehadiran'] = "Sakit";
                        $totalSakit += 1;
                    } else if ($absen_masuk_pegawai->status  ==  'a') {
                        $totalAlfa += 1;
                        $absensis[$data->pegawai_id]['absensi'][$i]['kehadiran'] = "Alfa";
                    } else if ($absen_masuk_pegawai->status  ==  'c') {
                        $totalCuti += 1;
                        $absensis[$data->pegawai_id]['absensi'][$i]['kehadiran'] = "Cuti";
                    } else {
                        $absensis[$data->pegawai_id]['absensi'][$i]['kehadiran'] = "Tidak Hadir";
                    }
                } else {
                    $absensis[$data->pegawai_id]['absensi'][$i]['kehadiran'] = "";
                }
            }
        }
        // exit();

        return $this->render('list-absensi', [
            'absensis' => $absensis,
            'totalMasuk' => $totalMasuk,
            'totalAlfa' => $totalAlfa,
            'totalSakit' => $totalSakit,
            'totalCuti' => $totalCuti,
        ]);
    }
}
