<?php

if (!isset(Yii::app()->session['userid'])) header('Location: '. Yii::app()->request->baseUrl, 301);

class PoliController extends Controller
{

	public function actionIndex()
	{
		$data['poli'] = Poli::model()->fetch();

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
		$result = Poli::model()->add_action();
	}

	public function actionEdit($id = '')
	{
		if (empty($id)) exit('Data not available!');
		$data['poli'] = Poli::model()->getPoliById($id);

		if (!$data['poli']['poli_id']) exit('Poli tidak terdaftar');

		$this->layout = 'basic';
		$this->render('edit', $data);
	}

	public function actionEdit_action()
	{
		if (!$_POST) exit('Data not available!');
		$data = Poli::model()->getPoliById(htmlspecialchars($_POST['poli_id'], ENT_QUOTES));
		if (!$data['poli_id']) exit('Poli tidak terdaftar');

		$result = Poli::model()->edit_action();
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
