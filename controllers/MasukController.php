<?php

namespace app\controllers;

use app\models\LoginForm;
use yii\web\Controller;
use Yii;

class MasukController extends Controller
{
    public $layout = 'main-login';

    public function actionIndex()
    {
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

            if (!$form->login()) {
                echo  'asdsada';
            }else{
                echo  "asdasdasdadad";
            }

        } else {
            return $this->render('index');
        }


    }

}
