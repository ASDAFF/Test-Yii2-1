<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

$this->title = 'Кабинет пользователя';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
	<h1><?= Html::encode($this->title) ?></h1>

	<p>Здесь вы можете отредактировать свои данные, добавить фотографию.</p>

	<?php $form = ActiveForm::begin([
		'id' => 'profile-form',
		'options' => ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data'],
		'fieldConfig' => [
			'template' => "{label}\n<div class=\"col-lg-6\">{input}</div>\n<div class=\"col-lg-3\">{error}</div>",
			'labelOptions' => ['class' => 'col-lg-2 control-label'],
		],
	]); ?>


	<?= $form->field($model, 'sex')->radioList(array('m'=>'Мужской','f'=>'Женский'))->label('Пол*'); ?>

	<?= $form->field($model, 'phone')->label('Номер телефона') ?>

	<?= $form->field($model, 'country')->label('Страна') ?>

	<?= $form->field($model, 'city')->label('Город') ?>

	<?= $form->field($model, 'photo')->fileInput()->label('Фото') ?>

	<div class="form-group">
		<div class="col-lg-offset-2 col-lg-11">
			<?php if (empty($model->photo)):?>
				Вы еще не загрузили фото
			<?php else: ?>
				<img src="/<?=Yii::$app->params['uploadFolder'] . $model->photo?>" style="width: 100px;">
				<br>
				<a href="<?=Url::toRoute('/user-area/del-photo/')?>" class="must-confirm">Удалить фото</a>
			<?php endif;?>
		</div>
	</div>


	<div class="form-group">
		<div class="col-lg-offset-2 col-lg-11">
			<?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
		</div>
	</div>

	<?php ActiveForm::end(); ?>
</div>
