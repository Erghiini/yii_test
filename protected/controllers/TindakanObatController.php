<?php

if (!isset(Yii::app()->session['userid'])) header('Location: '. Yii::app()->request->baseUrl, 301);

class TindakanObatController extends Controller
{

	public function actionIndex()
	{
		$data['tindakanobat'] = TindakanObat::model()->fetch();

		$this->layout = 'basic';
		$this->render('index', $data);
	}

	public function actionAdd($id = '')
	{
		$data['tindakanobat'] = TindakanObat::model()->getPendaftaranById($id);
		$data['poli'] = Poli::model()->fetch();
		$data['tindakan'] = Tindakan::model()->fetch();

		$this->layout = 'basic';
		$this->render('add', $data);
	}

	public function actionAdd_action()
	{
		if (!$_POST) return 'Data not available!';
		$result = TindakanObat::model()->add_action();
		// echo '<pre>';
		// print_r($_POST);
	}

	public function actionEdit($id = '')
	{
		$data['tindakanobat'] = TindakanObat::model()->getPendaftaranById($id);
		$data['poli'] = Poli::model()->fetch();
		$data['tindakan'] = Tindakan::model()->fetch();

		$this->layout = 'basic';
		$this->render('edit', $data);
	}

	public function actionEdit_action()
	{
		if (!$_POST) return 'Data not available!';
		$data = TindakanObat::model()->getTindakanObatById(htmlspecialchars($_POST['tindakanobat_id'], ENT_QUOTES));
		if (!$data['tindakanobat_id']) return 'TindakanObat tidak terdaftar';

		$result = TindakanObat::model()->edit_action();
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
