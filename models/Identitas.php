<?php

namespace app\models;

use app\models\Sesi;
use Yii;
use yii\base\Model;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property integer $userid
 * @property string $username
 * @property string $password
 * @property string $nama
 * @property string $email
 * @property string $telepon
 * @property string $role
 *
 * @property TbPegawai $id_pegawai
 */
class Identitas extends Model implements IdentityInterface
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'akun.akn_user';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid', 'username', 'password', 'id_pegawai'], 'required'],
            [['userid'], 'integer'],
            [['role'], 'string'],
            [['username', 'password'], 'string', 'max' => 255],
            [['nama', 'email'], 'string', 'max' => 35],
            [['telepon'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'userid' => Yii::t('app', 'user ID'),
            'username' => Yii::t('app', 'Username'),
            'password' => Yii::t('app', 'Password'),
            'id_pegawai' => Yii::t('app', 'Kode Pegawai'),
            'email' => Yii::t('app', 'Email'),
            'telepon' => Yii::t('app', 'Telepon'),
            'role' => Yii::t('app', 'Role'),
        ];
    }


    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
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

        if (is_null($sesi)) {
            Yii::$app->session->setFlash('warning', 'Sesi tidak ditemukan.');
            Yii::$app->user->logout(true);
            return null;
        } elseif (!$sesi->cekStatus()) {
            Yii::$app->session->setFlash('warning', $sesi->getErrors());
            Yii::$app->user->logout(true);
            return null;
        } else {
            return new self($sesi);
        }
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        $sesi = Sesi::find()
            ->where([
                'kds' => $token,
                'isk' => '0',
            ])
            ->orderBy('tgb DESC')
            ->limit(1)
            ->one();
        if (is_null($sesi)) {
            Yii::trace('Sesi tidak ditemukan', 'affandes');
            return null;
        } elseif (!$sesi->cekStatus()) {
            return null;
        } else {
            return new self($sesi);
        }
    }


    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->userid;
    }

    private $_sesi = false;

    public $kodeSesi;

    /**
     * @return mixed
     */
    public function getKodeSesi()
    {
        return $this->kodeSesi;
    }

    /**
     * @param mixed $kodeSesi
     */
    public function setKodeSesi($kodeSesi)
    {
        $this->kodeSesi = $kodeSesi;
    }

    public function __construct($config = [])
    {

        if ($config instanceof Sesi) {
            parent::__construct($config);

        }
    }

    /**
     * @return int
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * @param int $userid
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getNama()
    {
        return $this->nama;
    }

    /**
     * @param string $nama
     */
    public function setNama($nama)
    {
        $this->nama = $nama;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getTelepon()
    {
        return $this->telepon;
    }

    /**
     * @param string $telepon
     */
    public function setTelepon($telepon)
    {
        $this->telepon = $telepon;
    }

    /**
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param string $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @return TbPegawai
     */
    public function getIdPegawai()
    {
        return $this->id_pegawai;
    }

    /**
     * @param TbPegawai $id_pegawai
     */
    public function setIdPegawai($id_pegawai)
    {
        $this->id_pegawai = $id_pegawai;
    }


    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
//        return self::findOne(['userid' => $this->getId()]);
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    /**
     * @return \yii\db\ActiveQuery
     */


}
