<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

$this->title = 'Администрирование';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
	<h1><?= Html::encode($this->title) ?></h1>

	<?php if (!empty($Users)):?>
		<table class="table table-striped">
			<?php foreach ($Users as $User):?>
				<tr>
					<td><?=$User['userID']?></td>
					<td><?=$User['email']?></td>
					<td><?=$User->userData->sex?></td>
					<td><?=Html::encode($User->userData->country)?></td>
					<td><?=Html::encode($User->userData->city)?></td>
					<td><?=Html::encode($User->userData->phone)?></td>
					<td><?=date("d/m/Y в H:i:s", $User->userData->dateAdd)?></td>
					<td><a href="<?=Url::toRoute(['admin/user-comments/', 'userID' => $User->userID])?>"><i class="glyphicon glyphicon-comment"></i></a></td>
				</tr>
			<?php endforeach;?>
		</table>
		<?= LinkPager::widget(['pagination' => $Pagination]);?>
	<?php endif;?>
</div>
