<?php

if (!isset(Yii::app()->session['userid'])) header('Location: '. Yii::app()->request->baseUrl, 301);

class WilayahController extends Controller
{

	public function actionIndex()
	{
		$data['wilayah'] = Wilayah::model()->fetch();

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

		$data = Wilayah::model()->validateWilayahNama();
		if ($data['jml'] > 0) exit('Nama wilayah sudah terdaftar');

		$result = Wilayah::model()->add_action();
	}

	public function actionEdit($id = '')
	{
		if (empty($id)) exit('Data not available!');

		$data['wilayah'] = Wilayah::model()->getWilayahById($id);
		if (!$data['wilayah']['wilayah_id']) exit('Data wilayah tidak terdaftar');

		$this->layout = 'basic';
		$this->render('edit', $data);
	}

	public function actionEdit_action()
	{
		if (!$_POST) exit('Data not available!');

		$data = Wilayah::model()->validateWilayahNamaById();
		if ($data['jml'] > 0) exit('Nama wilayah sudah terdaftar');

		$result = Wilayah::model()->edit_action();
	}

	public function actionHapus_action()
	{
		if (!$_POST) exit('Data not available!');

		$result = Wilayah::model()->hapus_action();
	}
}
