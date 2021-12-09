<?php

if (!isset(Yii::app()->session['userid'])) header('Location: '. Yii::app()->request->baseUrl, 301);

class PendaftaranController extends Controller
{

	public function actionIndex()
	{
		$data['pendaftaran'] = Pendaftaran::model()->fetch();

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
		if (!$_POST) return 'Data not available!';
		$result = Pendaftaran::model()->add_action();
	}

	public function actionEdit($id = '')
	{
		if (empty($id)) return 'Data not available!';
		$data['pendaftaran'] = Pendaftaran::model()->getPendaftaranById($id);

		if (!$data['pendaftaran']['pendaftaran_id']) return 'Pendaftaran tidak terdaftar';
		$data['poli'] = Poli::model()->fetch();

		$this->layout = 'basic';
		$this->render('edit', $data);
	}

	public function actionEdit_action()
	{
		if (!$_POST) return 'Data not available!';
		$data = Pendaftaran::model()->getPendaftaranById(htmlspecialchars($_POST['pendaftaran_id'], ENT_QUOTES));
		if (!$data['pendaftaran_id']) return 'Pendaftaran tidak terdaftar';

		$result = Pendaftaran::model()->edit_action();
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
