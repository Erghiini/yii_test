<?php

if (!isset(Yii::app()->session['userid'])) header('Location: '. Yii::app()->request->baseUrl, 301);

class PembayaranController extends Controller
{

	public function actionIndex()
	{
		$data['pembayaran'] = Pembayaran::model()->fetch();

		$this->layout = 'basic';
		$this->render('index', $data);
	}

	public function actionAdd($id = '')
	{
		$data['pembayaran'] = Pembayaran::model()->getPendaftaranById($id);
		$data['poli'] = Poli::model()->fetch();
		$data['tindakan'] = Tindakan::model()->fetch();

		$data['harga_obat'] = Pembayaran::model()->getHargaObatById($id);

		$this->layout = 'basic';
		$this->render('add', $data);
	}

	public function actionAdd_action()
	{
		if (!$_POST) exit('Data not available!');
		
		Pembayaran::model()->add_action();
	}

	public function actionView($id = '')
	{
		$data['pembayaran'] = Pembayaran::model()->getPendaftaranById($id);
		$data['poli'] = Poli::model()->fetch();
		$data['tindakan'] = Tindakan::model()->fetch();

		$data['harga_obat'] = Pembayaran::model()->getHargaObatById($id);

		$this->layout = 'basic';
		$this->render('view', $data);
	}

	public function actionEdit_action()
	{
		if (!$_POST) exit('Data not available!');
		$data = Pembayaran::model()->getPembayaranById(htmlspecialchars($_POST['pembayaran_id'], ENT_QUOTES));
		if (!$data['pembayaran_id']) exit('Pembayaran tidak terdaftar');

		$result = Pembayaran::model()->edit_action();
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}
