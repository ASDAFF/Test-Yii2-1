<?php

namespace app\controllers;

use Yii;
use app\models\RemarkForm;
use app\models\Users;
use yii\web\Controller;
use yii\data\Pagination;

class AdminController extends Controller
{

	public function actions(){
		return [
			'error' => [
				'class' => 'yii\web\ErrorAction',
			],
		];
	}

	public function actionIndex(){
		if (!\Yii::$app->user->isGuest && Yii::$app->user->identity->admin == true) {
			$UsersQuery = Users::find();

			$Pagination = new Pagination(['totalCount' => $UsersQuery ->count(), 'pageSize' => 5]);

			$Users = $UsersQuery->joinWith('userData')
								 ->offset($Pagination->offset)
								 ->limit($Pagination->limit)
								 ->all();


			return $this->render('index', ['Users' => $Users, 'Pagination' => $Pagination]);
		} else {
			return $this->redirect(['site/login']);
		}
	}

	public function actionUserComments(){
		if (!\Yii::$app->user->isGuest && Yii::$app->user->identity->admin == true) {

			$User = Users::find()
				->joinWith('userRemarks')
				->where(['users.userID' => Yii::$app->request->get('userID')])
				->orderBy(['remarks.dateAdd' => SORT_DESC])
				->one();

			if (empty($User->userID)){
				return $this->render('/site/error', ['name' => 'Ошибка', 'message' => 'Такого пользователя не существует']);
			}

			$model = new RemarkForm();

			if ($model->load(Yii::$app->request->post())){
				if ($model->add($User->userID)){
					$User = Users::find()
						->joinWith('userRemarks')
						->where(['users.userID' => $User->userID])
						->one();
				}
			}

			return $this->render('remarks', ['model' => $model, 'User' => $User]);
		} else {
			return $this->redirect(['site/login']);
		}
	}
}
