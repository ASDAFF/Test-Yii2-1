<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 */
class RegistrationForm extends Model
{
	public $email;
	public $password;
	public $passwordConfirm;
	public $phone;
	public $sex = 'm';
	public $verifyCode;

	/**
	 * @return array the validation rules.
	 */
	public function rules()
	{
		return [
			[['email', 'password', 'passwordConfirm', 'sex'], 'required', 'message' => 'Обязательное поле'],
			['email', 'email', 'message' => 'Введите правильный e-mail'],
			['password', 'string', 'min' => 6, 'message' => 'Минимум 6 символов'],
			['password', 'compare', 'compareAttribute' => 'passwordConfirm', 'message' => 'Пароли должны совпадать'],
			['verifyCode', 'captcha', 'message' => 'Неправильный код'],
			['email', 'unique', 'targetClass' => 'app\models\Users', 'message' => 'Этот e-mail уже используется'],
		];
	}

	public function registration()
	{
		if ($this->validate()) {
			$UsersModel = new Users();
			$UsersModel->email = $this->email;
			$UsersModel->pwd = md5($this->password . Yii::$app->params['salt']);
			$UsersModel->save();

			$UserData = new UserData();
			$UserData->userID = $UsersModel->userID;
			$UserData->sex = $this->sex;
			$UserData->dateAdd = time();
			$UserData->save();

			return true;
		} else {
			return false;
		}
	}
}
