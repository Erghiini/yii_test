<?php

class User extends CActiveRecord
{
    public function fetch()
    {
        $query = "
            SELECT *
            FROM user
            ORDER BY created_date DESC
        ";
        return Yii::app()->db->createCommand($query)->queryAll();
    }

    public function getUserByUserName()
    {
        $user_name = htmlspecialchars($_POST['user_name'], ENT_QUOTES);
        $query = "
            SELECT count(*) AS jml
            FROM user
            WHERE user_name = '$user_name'
        ";
        return Yii::app()->db->createCommand($query)->queryRow();
    }

    public function add_action()
    {
        $user_name      = htmlspecialchars($_POST['user_name'], ENT_QUOTES);
        $user_password  = md5('123');
        $user_level     = htmlspecialchars($_POST['user_level'], ENT_QUOTES);

        $query = "
            INSERT INTO user (
                user_name,
                user_password,
                user_level
            ) VALUES (
                '$user_name',
                '$user_password',
                '$user_level'
            )
        ";
        return Yii::app()->db->createCommand($query)->query();
    }

    public function getUserById($user_id)
    {
        $user_id = htmlspecialchars($user_id, ENT_QUOTES);
        $query   = "
            SELECT *
            FROM user
            WHERE user_id = '$user_id'
        ";
        return Yii::app()->db->createCommand($query)->queryRow();
    }

    public function edit_action()
    {
        $user_id    = htmlspecialchars($_POST['user_id'], ENT_QUOTES);
        $user_name  = htmlspecialchars($_POST['user_name'], ENT_QUOTES);
        $user_level = htmlspecialchars($_POST['user_level'], ENT_QUOTES);

        $query = "
            UPDATE user SET
                user_name = '$user_name',
                user_level = '$user_level'
            WHERE user_id = '$user_id'
        ";
        return Yii::app()->db->createCommand($query)->query();
    }

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

    public function hapus_action()
    {
        $user_id    = htmlspecialchars($_POST['id'], ENT_QUOTES);

        $query = "
            DELETE FROM user
            WHERE user_id = '$user_id'
        ";
        return Yii::app()->db->createCommand($query)->query();
    }

    public function reset_action()
    {
        $user_id        = htmlspecialchars($_POST['id'], ENT_QUOTES);
        $user_password  = md5('123');

        $query = "
            UPDATE user SET
                user_password = '$user_password'
            WHERE user_id = '$user_id'
        ";
        return Yii::app()->db->createCommand($query)->query();
    }

    public function validateUserPassword($user_password)
    {
        $user_id = Yii::app()->session['userid'];

        $query   = "
            SELECT count(*) AS jml
            FROM user
            WHERE   user_id       = '$user_id'
                AND user_password = '$user_password'
        ";
        return Yii::app()->db->createCommand($query)->queryRow();
    }

    public function UbahPassword_action()
    {
        $user_id        = Yii::app()->session['userid'];
        $user_password  = md5($_POST['password_baru']);

        $query = "
            UPDATE user SET
                user_password = '$user_password'
            WHERE user_id = '$user_id'
        ";
        return Yii::app()->db->createCommand($query)->query();
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
