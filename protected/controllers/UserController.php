<?php

if (!isset(Yii::app()->session['userid'])) header('Location: '. Yii::app()->request->baseUrl, 301);

class UserController extends Controller
{

	public function actionIndex()
	{
		$data['user'] = User::model()->fetch();

		$this->layout = 'basic';
		$this->render('index', $data);
	}

	public function actionAdd()
	{
		$this->layout = 'basic';
		$this->render('add');
	}

	public function actionAdd_action()
	{
		if (!$_POST) exit('Data not available!');

		$result = User::model()->getUserByUserName();
		if ($result['jml'] > 0) exit('Username sudah terdaftar');

		$result = User::model()->add_action();
	}

	public function actionEdit($id = '')
	{
		if (empty($id)) exit('Data not available!');
		$data['user'] = User::model()->getUserById($id);

		if (!$data['user']['user_id']) exit('User tidak terdaftar');

		$this->layout = 'basic';
		$this->render('edit', $data);
	}

	public function actionEdit_action()
	{
		if (!$_POST) exit('Data not available!');
		$data = User::model()->getUserById(htmlspecialchars($_POST['user_id'], ENT_QUOTES));
		if (!$data['user_id']) exit('User tidak terdaftar');

		$result = User::model()->edit_action();
	}

	public function actionHapus_action()
	{
		if (!$_POST) exit('Data not available!');
		$data = User::model()->getUserById(htmlspecialchars($_POST['id'], ENT_QUOTES));
		if (!$data['user_id']) exit('User tidak terdaftar');

		$data = User::model()->hapus_action();
	}

	public function actionReset_action()
	{
		if (!$_POST) exit('Data not available!');
		$data = User::model()->getUserById(htmlspecialchars($_POST['id'], ENT_QUOTES));
		if (!$data['user_id']) exit('User tidak terdaftar');

		$result = User::model()->reset_action();
	}

}
