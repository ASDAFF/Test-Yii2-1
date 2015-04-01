<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\RegistrationForm;

class RegistrationController extends Controller
{

	public function actions()
	{
		return [
			'error' => [
				'class' => 'yii\web\ErrorAction',
			],
			'captcha' => [
				'class' => 'yii\captcha\CaptchaAction',
				'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
			],
		];
	}

	public function actionIndex(){
		$model = new RegistrationForm();

		if ($model->load(Yii::$app->request->post()) && $model->registration()) {
			return $this->goBack();
		} else {
			return $this->render('/site/registration', [
				'model' => $model,
			]);
		}
	}
}
