<?php

if (!isset(Yii::app()->session['userid'])) header('Location: '. Yii::app()->request->baseUrl, 301);

class PegawaiController extends Controller
{

	public function actionIndex()
	{
		$data['pegawai'] = Pegawai::model()->fetch();

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
		$result = Pegawai::model()->add_action();
	}

	public function actionEdit($id = '')
	{
		if (empty($id)) return 'Data not available!';
		$data['pegawai'] = Pegawai::model()->getPegawaiById($id);

		if (!$data['pegawai']['pegawai_id']) return 'Pasien tidak terdaftar';

		$this->layout = 'basic';
		$this->render('edit', $data);
	}

	public function actionEdit_action()
	{
		if (!$_POST) return 'Data not available!';
		$data = Pegawai::model()->getPegawaiById(htmlspecialchars($_POST['pegawai_id'], ENT_QUOTES));
		if (!$data['pegawai_id']) return 'Pegawai tidak terdaftar';

		$result = Pegawai::model()->edit_action();
	}

	public function actionHapus_action()
	{
		if (!$_POST) return 'Data not available!';
		$data = Pegawai::model()->hapus_action();
	}
	
}
