<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use yii\validators\ImageValidator;

/**
 * LoginForm is the model behind the login form.
 */
class ProfileForm extends Model
{
	public $sex;
	public $phone;
	public $country;
	public $city;
	public $photo;

	public function __construct(){
		$UserData = UserData::findOne(Yii::$app->user->id);
		$this->sex = $UserData->sex;
		$this->phone = $UserData->phone;
		$this->country = $UserData->country;
		$this->city = $UserData->city;
		$this->photo = $UserData->photo;
	}

	/**
	 * @return array the validation rules.
	 */
	public function rules()
	{
		return [
			['sex', 'required', 'message' => 'Обязательное поле'],
			[['phone', 'country', 'city'], 'trim'],
			['photo', 'image',  'extensions'=> 'jpg, jpeg, gif, png',
								'minWidth' => 90, 'maxWidth' => 800,
								'minHeight' => 90, 'maxHeight' => 800],
		];
	}

	public function save()
	{
		if ($this->validate()) {
			$UserData = UserData::findOne(Yii::$app->user->id);

			if (!empty($this->photo)){
				$fileName = Yii::$app->user->id . '.' . $this->photo->extension;
				$this->__addPhoto($fileName);
				$this->photo = $UserData->photo = $fileName;
			}

			$UserData->sex = $this->sex;
			$UserData->phone = $this->phone;
			$UserData->country = $this->country;
			$UserData->city = $this->city;

			return $UserData->save();
		} else {
			return false;
		}
	}


	/**
	 * Удаление фото юзера из папки и из таблицы
	 *
	 * @return bool
	 */
	public function deletePhoto(){
		$UserData = UserData::findOne(Yii::$app->user->id);

		if ($UserData->photo != null){
			unlink(Yii::$app->params['uploadFolder'] . $UserData->photo);
			$this->photo = $UserData->photo = null;
			return $UserData->save();
		}

		return false;
	}


	/**
	 * Загрузка и добавление изображения пользователя
	 *
	 * @param $fileName Имя файла
	 *
	 * @return bool
	 */
	private function __addPhoto($fileName){
		$UserData = UserData::findOne(Yii::$app->user->id);
		//Если имя загружаемого файла и ранее загруженного, разне - удаляем старый
		if ($UserData->photo != $fileName){
			$this->deletePhoto();
		}

		if ($this->photo->saveAs(Yii::$app->params['uploadFolder'] . $fileName, false) === true){
			$UserData->photo = $fileName;
			return $UserData->save();
		}

		return false;
	}
}
