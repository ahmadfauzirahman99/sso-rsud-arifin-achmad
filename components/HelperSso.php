<?php


namespace app\components;


use app\models\DataMasterStatusKepegawain;
use app\models\Sesi;
use app\models\TbPegawai;
use app\components\GoogleCalendar;

class HelperSso
{


	public $nip;
	public $nips;
	public $date;
	public $date_end;
	public $mulai;
	public $selesai;
	public $dump;

	public function __construct($nip = null, $nips = [], $date = null, $mulai = null, $selesai = null)
	{
		$this->nip = $nip;
		$this->nips = $nips;
		$this->date = $date;
		$this->mulai = $mulai;
		$this->selesai = $selesai;
	}
	const TypeUser = [
		'ROOT' => 'ROOT',
		'MEDIS' => 'MEDIS',
		'NONMEDIS' => 'NONMEDIS',
		'APLIKASI' => 'APLIKASI',
		'Eksternal' => 'Eksternal',
		'Keperawatan' => 'KEPERAWATAN'
	];

	const TypeUserStatus = [
		'0' => 'Pending',
		'1' => 'Aktif',
		'2' => 'Tidak Aktif'
	];

	public static function getDataPegawai()
	{
		$sso = \app\models\AkunAknUser::find()->select('id_pegawai')->all();

		$array = [];
		foreach ($sso as $v) {
			$array[] = $v->id_pegawai;
		}


		$r = TbPegawai::find()->where(['not in', 'pegawai_id', $array])
			->orderBy(['nama_lengkap' => SORT_ASC])
			->all();

		return $r;
	}


	public static function getDataPegawaiByNip($id)
	{
		$r = TbPegawai::find()->where(['pegawai_id' => $id])->one();
		// if ($r) {
		// }
		return $r;
	}

	static function getLogLogin($id)
	{
		$r = Sesi::find()->where(['ida' => $id])->orderBy(['tgb' => SORT_DESC])->limit(5)->all();
		return $r;
	}

	/**
	 * @return array date hari libur nasional
	 */
	public function cekNationalFreeDay()
	{
		$Y = date('Y', strtotime(date('Y')));
		$m = date('m', strtotime(date('m')));
		$calendar = new GoogleCalendar();
		$holiday = $calendar->getHolidayThisMonth($Y, 3);
		$date = [];
		foreach ($holiday as $key => $value) {
			array_push($date, $key);
		}
		return $date;
	}

	/**
	 * @param $add penambahan hari ketika hari dalam seminggu habis
	 * @param $delay delay pengecekan hari kerja dimulai
	 * @return array
	 */
	public function getHariKerja($add, $delay = 0)
	{
		$start = date('Y-m-d');

		$start = date('Y-m-d', strtotime("+$delay days", strtotime($start)));

		$dayinweek = date('w');
		$thisweek = $add - $dayinweek;
		$untilnextweek = $thisweek + $add;
		$end = date('Y-m-d', strtotime('+' . $untilnextweek . ' days', strtotime($start)));
		$this->date_end = $end;

		$buka_range_jadwal = $this->createDateRangeArray($start, $end);

		/** @var y-m-d arr $hasil selisih antara range set jadwal dengan jadwal libur nasional */
		$hasil = array_diff($buka_range_jadwal, $this->cekNationalFreeDay());

		/** @var y-m-d arr $worksday waktu kerja (bukan waktu weekend dan libur nasional ) */
		$worksday = [];
		foreach ($hasil as $item) {
			$toweek = date('w Y-m-d', strtotime($item));
			//            0 adalah hari minggu dan 6 adalah sabtu
			if ($toweek[0] == '0' || $toweek[0] == '6') {
				unset($toweek);
			} else {
				array_push($worksday, $item);
			}
		}
		return $worksday;
	}

	public function createDateRangeArray($start, $end)
	{
		$result = array();
		$dari = mktime(1, 0, 0, substr($start, 5, 2), substr($start, 8, 2), substr($start, 0, 4));
		$sampai = mktime(1, 0, 0, substr($end, 5, 2), substr($end, 8, 2), substr($end, 0, 4));
		if ($sampai >= $dari) {
			array_push($result, date('Y-m-d', $dari)); // first entry
			while ($dari < $sampai) {
				$dari += 86400; // add 24 hours in seconds
				array_push($result, date('Y-m-d', $dari));
			}
		}
		return $result;
	}

	/**
	 * @return array jam kerja
	 */
	public function getJamKerja()
	{
		$jamkerja = [
			['07:30:00', '12:45:00'],
			['13:00:00', '16:00:00'],
		];

		$jamkerjamenit = [];
		foreach ($jamkerja as $item) {
			$range = [];
			foreach ($item as $time) {

				$time = Konversi::setTimesMinutes($time);
				array_push($range, $time);
			}
			array_push($jamkerjamenit, $range);
		}

		return $jamkerjamenit;
	}
}
