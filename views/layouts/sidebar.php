<li class="nav-label ">Data Master</li>
<li class="nav-item">
    <a href="<?= Yii::$app->urlManager->createUrl('site/index') ?>" class="nav-link">
        <i data-feather="home"></i>
        <span>Home</span>
    </a>
</li>

<li class="nav-label mg-t-25">Dashboard</li>
<li class="nav-item">
    <a href="<?= Yii::$app->urlManager->createUrl('dashboard/index') ?>" class="nav-link">
        <i data-feather="pie-chart"></i>
        <span>Dashboard Monitoring</span>
    </a>
</li>

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