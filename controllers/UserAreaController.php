<?php

namespace app\controllers;

use Yii;
use app\models\ProfileForm;
use yii\web\Controller;
use yii\web\UploadedFile;

class UserAreaController extends Controller
{
	public function actions(){
		return [
			'error' => [
				'class' => 'yii\web\ErrorAction',
			],
		];
	}

	public function actionIndex(){
		if (!\Yii::$app->user->isGuest) {
			$model = new ProfileForm();

			if ($model->load(Yii::$app->request->post())) {
				$model->photo = UploadedFile::getInstance($model, 'photo');

				$model->save();
			}
			return $this->render('index', ['model' => $model]);
		} else {
			return $this->redirect(['site/login']);
		}
	}

	public function actionDelPhoto(){
		if (!\Yii::$app->user->isGuest) {
			$model = new ProfileForm();

			$model->deletePhoto();

			return $this->redirect(['user-area/index']);
		} else {
			return $this->redirect(['site/login']);
		}
	}
}
