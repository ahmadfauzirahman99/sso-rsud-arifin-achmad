<?php

namespace app\models;

use app\components\TipeAkun;

class User extends \yii\web\User
{
    public function isApp()
    {
        if ($this->isGuest) {
            return false;
        } else {
            return $this->getIdentity()->getRoles() == TipeAkun::ROOT;
        }
    }
}