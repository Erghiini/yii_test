<?php

if (!isset(Yii::app()->session['userid'])) header('Location: '. Yii::app()->request->baseUrl, 301);

class TindakanController extends Controller
{

	public function actionIndex()
	{
		$data['tindakan'] = Tindakan::model()->fetch();

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
		$result = Tindakan::model()->add_action();
	}

	public function actionEdit($id = '')
	{
		if (empty($id)) exit('Data not available!');
		$data['tindakan'] = Tindakan::model()->getTindakanById($id);

		if (!$data['tindakan']['tindakan_id']) exit('Data tindakan tidak terdaftar');

		$this->layout = 'basic';
		$this->render('edit', $data);
	}

	public function actionEdit_action()
	{
		if (!$_POST) exit('Data not available!');

		$data = Tindakan::model()->validateTindakanNamaById();
		if ($data['jml'] > 0) exit('Nama Tindakan sudah terdaftar');

		$result = Tindakan::model()->edit_action();
	}
}
