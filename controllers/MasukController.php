<?php

namespace app\controllers;

use app\models\AkunAknUser;
use app\models\LoginForm;
use app\models\Sesi;
use yii\web\Controller;
use Yii;

class MasukController extends Controller
{
    public $layout = 'main-login';

    public function actionIndex()
    {
//
//        $s = md5(123456789);
//        var_dump($s);
//        exit();

        if (!Yii::$app->user->isGuest) {
            return $this->goBack();
        }
        if (Yii::$app->request->isPost) {
            $p = Yii::$app->request->post('Masuk');
            $a = [
                'kodeAkun' => ((isset($p[0])) ? $p[0] : ''),
                'kataSandi' => ((isset($p[1])) ? $p[1] : ''),
                'ingat' => ((isset($p[2])) ? true : false),
            ];
            $form = new LoginForm();
            $form->attributes = $a;

//            var_dump($form->login());
//            exit();
            if (!$form->login()) {
                $this->layout = 'main-login';
                Yii::$app->session->setFlash('warning', $form->getErrors());
                return $this->render('index');
//                echo  'asdsada';
            } else {
//                echo 'sadasda';
//                exit();
                return $this->redirect(['site/index']);
            }

        } else {
            $this->layout = 'main-login';
            return $this->render('index');
        }
    }



}
