<?php

if (!isset(Yii::app()->session['userid'])) header('Location: '. Yii::app()->request->baseUrl, 301);

class ProfileController extends Controller
{

	public function actionIndex()
	{
		$data['user'] = User::model()->getUserById(Yii::app()->session['userid']);

		$this->layout = 'basic';
		$this->render('index', $data);
	}

	public function actionUbahPassword()
	{
		$data['user'] = User::model()->getUserById(Yii::app()->session['userid']);

		$this->layout = 'basic';
		$this->render('edit', $data);
	}

	public function actionUbahPassword_action()
	{
		$data = User::model()->validateUserPassword(md5($_POST['password_lama']));
		if ($data['jml'] <= 0) exit('Password anda salah!');
		
		if ($_POST['password_baru'] != $_POST['kofirm_password_baru']) exit('Password baru & konfirmasi password tidak sama!');

		$result = User::model()->UbahPassword_action();
	}

}
