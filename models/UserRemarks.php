<?php
namespace app\models;

use yii\db\ActiveRecord;

class UserRemarks extends ActiveRecord{

	public static function tableName(){
		return 'remarks';
	}
}
?>