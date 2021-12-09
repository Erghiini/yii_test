<?php

if (!isset(Yii::app()->session['userid'])) header('Location: '. Yii::app()->request->baseUrl, 301);

class DokterController extends Controller
{

	public function actionIndex()
	{
		$data['dokter'] = Dokter::model()->fetch();

		$this->layout = 'basic';
		$this->render('index', $data);
	}

	public function actionAdd()
	{
		$data['poli'] = Poli::model()->fetch();
		$this->layout = 'basic';
		$this->render('add', $data);
	}

	public function actionAdd_action()
	{
		if (!$_POST) exit('Data not available!');
		$result = Dokter::model()->getDokterByNomorSTR($_POST['dokter_nomor_str']);
		if (isset($result['dokter_nomor_str'])) exit('Nomor STR sudah terdaftar terdaftar');

		$result = Dokter::model()->add_action();
	}

	public function actionEdit($id = '')
	{
		if (empty($id)) exit('Data not available!');
		$data['dokter'] = Dokter::model()->getDokterById($id);

		if (!$data['dokter']['dokter_id']) exit('Dokter tidak terdaftar');

		$data['poli'] = Poli::model()->fetch();
		$this->layout = 'basic';
		$this->render('edit', $data);
	}

	public function actionEdit_action()
	{
		if (!$_POST) exit('Data not available!');
		$data = Dokter::model()->getDokterById(htmlspecialchars($_POST['dokter_id'], ENT_QUOTES));
		if (!$data['dokter_id']) exit('Dokter tidak terdaftar');

		$result = Dokter::model()->edit_action();
	}

	public function actionGetDokterByPoliId()
	{
		$data = Dokter::model()->actionGetDokterByPoliId();

		$this->layout = '/';
		echo json_encode($data);
	}

}
