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
<?php if (Yii::$app->user->identity->getRoles() == 'ROOT'): ?>
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
<?php endif ?>