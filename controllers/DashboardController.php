<?php

namespace app\controllers;

class DashboardController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAbsensi()
    {
        return $this->render('absensi');
    }
}
