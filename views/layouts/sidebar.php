<li class="nav-label ">Home</li>
<li class="nav-item">
	<a href="<?= Yii::$app->urlManager->createUrl('site/index') ?>" class="nav-link">
		<i data-feather="home"></i>
		<span>Beranda</span>
	</a>
</li>

<li style="display: none" class="nav-label mg-t-25">Dashboard</li>
<li style="display: none" class="nav-item">
	<a href="<?= Yii::$app->urlManager->createUrl('dashboard/index') ?>" class="nav-link">
		<i data-feather="pie-chart"></i>
		<span>Dashboard Monitoring</span>
	</a>
</li>
<?php if (Yii::$app->user->identity->roles == 'ROOT' || Yii::$app->user->identity->roles == 'APLIKASI' || Yii::$app->user->identity->kodeAkun == '1471091710870041') { ?>
	<li class="nav-label mg-t-25">Data Master</li>
	<li class="nav-item">
		<a href="<?= Yii::$app->urlManager->createUrl('aplikasi/index') ?>" class="nav-link">
			<i data-feather="list"></i>
			<span>Aplikasi RSUD</span>
		</a>
	</li>
	<li class="nav-item">
		<a href="<?= Yii::$app->urlManager->createUrl('user/index') ?>" class="nav-link">
			<i data-feather="user"></i>
			<span>User RSUD</span>
		</a>
	</li>

	<li class="nav-item" style="display: none;">
		<a href="<?= Yii::$app->urlManager->createUrl('user/koreksi-data') ?>" class="nav-link">
			<i data-feather="list"></i>
			<span>Koreksi Data</span>
		</a>
	</li>

	<li class="nav-item">
		<a href="<?= Yii::$app->urlManager->createUrl('site/list-absensi') ?>" class="nav-link">
			<i data-feather="file"></i>
			<span>Rekap Absensi</span>
		</a>
	</li>
	<li class="nav-item">
		<a href="<?= Yii::$app->urlManager->createUrl('dashboard/rekap-absensi-unit') ?>" class="nav-link">
			<i data-feather="list"></i>
			<span>Rekap Absensi Unit</span>
		</a>
	</li>
<?php } else { ?>
	<li class="nav-item">
		<a href="<?= Yii::$app->urlManager->createUrl('site/list-absensi') ?>" class="nav-link">
			<i data-feather="file"></i>
			<span>Rekap Absensi</span>
		</a>
	</li>
<?php } ?>

<li class="nav-label mg-t-25">Absensi dan Laporan</li>
<li class="nav-item">
	<a href="<?= Yii::$app->urlManager->createUrl('dashboard/absensi') ?>" class="nav-link">
		<i data-feather="list"></i>
		<span>Absensi Rekan Saya</span>
	</a>
</li>
<li class="nav-item" style="display: none;">
	<a href="<?= Yii::$app->urlManager->createUrl('dashboard/rekap-absensi-unit') ?>" class="nav-link">
		<i data-feather="list"></i>
		<span>Rekap Absensi Unit</span>
	</a>
</li>