<?php


namespace app\controllers;

use app\models\Absensi;
use app\models\AkunAknUser;
use app\models\TbPegawai;
use Yii;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\rest\Controller;
use stdClass;

header("Access-Control-Allow-Origin: *");

class ApiSsoController extends Controller
{
	function writeResponse($condition, $msg = null, $data = null)
	{
		$_res = new \stdClass();
		$_res->con = $condition == true ? true : false;
		$_res->msg = $msg;
		$_res->data = $data;
		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

		// $response = new \Phalcon\Http\Response();
		// return $response->setContent(json_encode($_res));
		return $_res;
	}

	public function actionGetPegawai($id)
	{
		$data = TbPegawai::find()->where(['ilike', 'nama_lengkap', $id . '%', false])->all();

		return $this->writeResponse(true, "Berhasil", $data);
	}

	public function actionChangePassword()
	{
		$rq = Yii::$app->request;
		$p = $rq->post();

		if (Yii::$app->user->identity->roles == 'NONMEDIS' || Yii::$app->user->identity->roles == 'MEDIS' || Yii::$app->user->identity->roles == 'ROOT') {
			$id = Yii::$app->user->identity->getId();
			$passwordBaru = $p['passwordBaru'];
			$konfirmasiPasswordBaru = $p['konfirmasiPasswordBaru'];

			if ($passwordBaru != $konfirmasiPasswordBaru) {
				return $this->writeResponse(false, 'Password Tidak Sama');
			}
			if (strlen($passwordBaru) < 6) {
				return $this->writeResponse(false, 'Password Harus Lebih Dari 6 Karakter');
			}
			$modelUserAkun = AkunAknUser::findOne($id);
			$modelUserAkun->password = md5($passwordBaru);
			if ($modelUserAkun->save()) {
				Yii::$app->user->logout(true);
				return $this->writeResponse(true, "Berhasil Merubah Password, Silahkan Login Kembali");
			} else {
				return $this->writeResponse(false, "Tidak Berhasil Merubah Password, Silahkan Coba Kembali");
			}
		} else {
		}
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
}
