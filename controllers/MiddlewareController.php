<?php


namespace app\controllers;

use app\models\Sesi;
use yii\web\Controller;
use Yii;

class MiddlewareController extends Controller
{

    public $layout = 'middleware';

    public function actionIndex($id = null, $app = null)
    {

        $sesi = Sesi::find()->
        where([
            'ida' => $id,
            'ipa' => Yii::$app->request->getUserIP(),
            'inf' => Yii::$app->request->getUserAgent(),
            'isk' => 0
        ])->orderBy('tgb DESC')
            ->limit(1)
            ->one();

        return $this->render('index', ['sesi' => $sesi]);
    }
}