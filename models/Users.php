<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Users extends ActiveRecord implements \yii\web\IdentityInterface {

	/**
	 * @inheritdoc
	 */
	public static function findIdentity($userID)
	{
		return static::findOne($userID);
	}

	/**
	 * @inheritdoc
	 */
	public static function findIdentityByAccessToken($password, $type = null)
	{
	}

	/**
	 * @inheritdoc
	 */
	public function getId(){
		return $this->getPrimaryKey();
	}

	/**
	 * @inheritdoc
	 */
	public function getAuthKey()
	{
	}

	/**
	 * @inheritdoc
	 */
	public function validateAuthKey($authKey)
	{

	}

	public function validatePassword($password){
		return $this->pwd === md5($password . Yii::$app->params['salt']);
	}

	public static function findByEmail($email){
        return static::findOne(['email' => $email]);
    }

	public function getUserData(){
		return $this->hasOne(UserData::className(), ['userID' => 'userID']);
	}

	public function getUserRemarks(){
		return $this->hasMany(UserRemarks::className(), ['userID' => 'userID'])->orderBy(['remarks.dateAdd' => SORT_DESC]);
	}
}
?>