<?php

class User extends CActiveRecord
{
    public function cekUserLogin()
    {
		$user_name 		= htmlspecialchars($_POST['user_name'], ENT_QUOTES);
		$user_password 	= md5(htmlspecialchars($_POST['user_password'], ENT_QUOTES));

        $query = "
            SELECT *
            FROM user
			WHERE 	user_name 		= '$user_name'
				AND user_password 	= '$user_password'
        ";
        return Yii::app()->db->createCommand($query)->queryRow();
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Dokter the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
