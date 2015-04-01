<?php
namespace app\models;

use yii\db\ActiveRecord;

class UserData extends ActiveRecord{

	public static function tableName(){
		return 'user_data';
	}
}
?>