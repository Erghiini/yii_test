<?php

if (!isset(Yii::app()->session['userid'])) header('Location: '. Yii::app()->request->baseUrl, 301);

class ObatController extends Controller
{

	public function actionIndex()
	{
		$data['obat'] = Obat::model()->fetch();

		$this->layout = 'basic';
		$this->render('index', $data);
	}

	public function actionGetObatByName()
	{
		$data = Obat::model()->actionGetObatByName();

		$this->layout = '/';
		echo json_encode($data);
	}

	public function actionAdd()
	{
		$this->layout = 'basic';
		$this->render('add');
	}

	public function actionAdd_action()
	{
		if (!$_POST) return 'Data not available!';
		
		$result = Obat::model()->getObatByName($_POST['obat_nama']);
		if (isset($result['obat_nama'])) exit('Obat sudah terdaftar');

		$result = Obat::model()->add_action();
	}

	public function actionEdit($id = '')
	{
		$data['obat'] = Obat::model()->getObatById($id);

		$this->layout = 'basic';
		$this->render('edit', $data);
	}

	public function actionEdit_action()
	{
		if (!isset($_POST)) exit('Data not available!');

		$result = Obat::model()->edit_action();
	}

}
