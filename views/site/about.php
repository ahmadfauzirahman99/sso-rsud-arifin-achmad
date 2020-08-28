<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
	<h1><?= Html::encode($this->title) ?></h1>

	<input type="date" id="date" class="form-control">

	<hr>
	<a href="#" onclick="prints()">Print</a>
</div>

<?php

$this->registerJs($this);
?>
