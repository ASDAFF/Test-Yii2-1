<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 */
class RemarkForm extends Model
{
	public $remark;

	/**
	 * @return array the validation rules.
	 */
	public function rules(){
		return [
			['remark', 'required'],
		];
	}

	public function add($userID){
		if ($this->validate()) {
			$Remarks = new UserRemarks();

			$Remarks->userID = $userID;
			$Remarks->remark = $this->remark;
			$Remarks->dateAdd = time();
			$this->remark = '';
			return $Remarks->save();
		} else {
			return false;
		}
	}
}
