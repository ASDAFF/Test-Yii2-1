<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Заметки о пользователе ID:' . $User->userID . ' (' . $User->email . ')';
$this->params['breadcrumbs'][] = ['label' => 'Администрирование', 'url' => ['admin/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
	<h1><?= Html::encode($this->title) ?></h1>

	<?php if (!empty($User->userRemarks)):?>
		<?php foreach ($User->userRemarks as $Remark):?>
			<div class="panel panel-primary">
				<div class="panel-heading"><?=date("d/m/Y в H:i:s", $Remark->dateAdd)?></div>
				<div class="panel-body">
					<?=nl2br(Html::encode($Remark->remark))?>
				</div>
			</div>
		<?php endforeach;?>
	<?php endif;?>

	<?php $form = ActiveForm::begin([
		'id' => 'remark-form',
		'options' => ['class' => ''],
		'fieldConfig' => [
			'template' => "<div class=\"form-group\">{label}\n{input}\n<div class=\"col-lg-3\">{error}</div></div>",
		],
	]); ?>

	<?= $form->field($model, 'remark')->textarea(['rows' => 5])->label('Комментарий') ?>

	<div class="form-group">
		<div class="col-lg-11">
			<?= Html::submitButton('Добавить', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
		</div>
	</div>

	<?php ActiveForm::end(); ?>
</div>
