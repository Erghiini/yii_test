<?php

if (!isset(Yii::app()->session['userid'])) header('Location: '. Yii::app()->request->baseUrl, 301);

class PasienController extends Controller
{

	public function actionIndex()
	{
		$data['pasien'] = Pasien::model()->fetch();

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
		if (!$_POST) return 'Data not available!';
		$result = Pasien::model()->add_action();
	}

	public function actionEdit($id = '')
	{
		if (empty($id)) return 'Data not available!';
		$data['pasien'] = Pasien::model()->getPasienById($id);

		if (!$data['pasien']['pasien_id']) return 'Pasien tidak terdaftar';

		$this->layout = 'basic';
		$this->render('edit', $data);
	}

	public function actionEdit_action()
	{
		if (!$_POST) return 'Data not available!';
		$data = Pasien::model()->getPasienById(htmlspecialchars($_POST['pasien_id'], ENT_QUOTES));
		if (!$data['pasien_id']) return 'Pasien tidak terdaftar';

		$result = Pasien::model()->edit_action();
	}

	public function actionGetPasienByName()
	{
		$data = Pasien::model()->actionGetPasienByName();

		$this->layout = '/';
		echo json_encode($data);
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
