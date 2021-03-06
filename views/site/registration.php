<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
	<h1><?= Html::encode($this->title) ?></h1>

	<p>Заполните форму регистрации:</p>

	<?php $form = ActiveForm::begin([
		'id' => 'registration-form',
		'options' => ['class' => 'form-horizontal'],
		'fieldConfig' => [
			'template' => "{label}\n<div class=\"col-lg-6\">{input}</div>\n<div class=\"col-lg-3\">{error}</div>",
			'labelOptions' => ['class' => 'col-lg-2 control-label'],
		],
	]); ?>

	<?= $form->field($model, 'email')->label('E-mail*') ?>

	<?= $form->field($model, 'password')->passwordInput()->label('Пароль*') ?>

	<?= $form->field($model, 'passwordConfirm')->passwordInput()->label('Пароль повторно*') ?>

	<?= $form->field($model, 'sex')->radioList(array('m'=>'Мужской','f'=>'Женский'))->label('Пол*'); ?>

	<?= $form->field($model, 'phone')->label('Номер телефона') ?>

	<?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
		'template' => '<div class="row"><div class="col-lg-1">{image}</div><div class="col-lg-12">{input}</div></div>',
	])->label('Код подтверждения*') ?>

	<div class="form-group">
		<div class="col-lg-offset-2 col-lg-11">
			<?= Html::submitButton('Регистрация', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
		</div>
	</div>

	<?php ActiveForm::end(); ?>
</div>
