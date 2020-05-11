<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\components\Breadcrumbs;
use app\assets\AppAsset;

//raoul2000\bootswatch\BootswatchAsset::$theme = 'United';
\app\assets\AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;1,100;1,300;1,700&display=swap"
          rel="stylesheet">

    <style>
        body {
            font-family: 'Roboto', sans-serif !important;
        }
    </style>
    <?php $this->head() ?>
</head>
<body class="page-profile">
<?php $this->beginBody() ?>

<aside class="aside aside-fixed">
    <div class="aside-header">
        <a href="<?= Yii::$app->urlManager->createUrl('site/index') ?>" class="aside-logo">Point
            Of<span> Services</span></a>
        <a href="" class="aside-menu-link">
            <i data-feather="menu"></i>
            <i data-feather="x"></i>
        </a>
    </div>
    <div class="aside-body">
        <div class="aside-loggedin">
            <div class="d-flex align-items-center justify-content-start">
                <a href="" class="avatar"><img src="<?= Yii::$app->request->baseUrl ?>/img/user1_128.png"
                                               class="rounded-circle" alt=""></a>
                <div class="aside-alert-link">
                    <a href="" class="new" data-toggle="tooltip" title="You have 2 unread messages"><i
                                data-feather="message-square"></i></a>
                    <a href="" class="new" data-toggle="tooltip" title="You have 4 new notifications"><i
                                data-feather="bell"></i></a>
                    <a href="#global-logout-modal" data-toggle="modal"
                       title="Sign out"><i data-feather="log-out"></i></a>
                </div>
            </div>
            <div class="aside-loggedin-user">
                <a href="#loggedinMenu" class="d-flex align-items-center justify-content-between mg-b-2"
                   data-toggle="collapse">
                    <h6 class="tx-semibold mg-b-0"><?= Yii::$app->user->identity->nama ?></h6>
                    <i data-feather="chevron-down"></i>
                </a>
                <p class="tx-color-03 tx-12 mg-b-0"><?= Yii::$app->user->identity->roles ?></p>
            </div>
            <div class="collapse" id="loggedinMenu">
                <ul class="nav nav-aside mg-b-0">
                    <li class="nav-item"><a href="" class="nav-link"><i data-feather="edit"></i>
                            <span>Edit Profile</span></a></li>
                    <li class="nav-item"><a href="" class="nav-link"><i data-feather="user"></i>
                            <span>View Profile</span></a></li>
                    <li class="nav-item"><a href="#global-logout-modal" data-toggle="modal" class="nav-link"><i
                                    data-feather="log-out"></i>
                            <span>Sign Out</span></a></li>
                </ul>
            </div>
        </div><!-- aside-loggedin -->
        <ul class="nav nav-aside">
            <?= $this->render('sidebar.php') ?>
        </ul>
    </div>
</aside>

<div class="content ht-100v pd-0">
    <div class="content-header">
        <div class="content-search">
            <i data-feather="search"></i>
            <input type="search" class="form-control" placeholder="Search">
        </div>
        <nav class="nav">
            <a href="" class="nav-link"><i data-feather="help-circle"></i></a>
            <a href="" class="nav-link"><i data-feather="grid"></i></a>
            <a href="" class="nav-link"><i data-feather="align-left"></i></a>
        </nav>
    </div><!-- content-header -->

    <div class="content-body">
        <div class="container pd-x-0 tx-13">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </div><!-- content-body -->
</div><!-- content -->


<!--modal logout-->
<div class="modal fade" id="global-logout-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content tx-14">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel2">Logout :(</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="mg-b-0">Apakah Anda Yakin Ingin Keluar Dari Aplikasi?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Nggak Jadi Cuy</button>
                <a href="<?= \yii\helpers\Url::to(['/keluar/index']) ?>" class="btn btn-primary tx-13">Ya, Yakin!</a>
            </div>
        </div>
    </div>
</div>

<?php $this->endBody() ?>
</body>

<script>
    yii.confirm = function (message, okCallback, cancelCallback) {
        Swal.fire({
            title: 'Perhatian!',
            text: message,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.value) {
                okCallback()
                console.log(okCallback);

                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        })
    };
</script>

</html>
<?php $this->endPage() ?>
