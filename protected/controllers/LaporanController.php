<?php

if (!isset(Yii::app()->session['userid'])) header('Location: '. Yii::app()->request->baseUrl, 301);

class LaporanController extends Controller
{

	public function actionIndex()
	{
		$this->layout = 'basic';
		$this->render('index');
	}

    public function actionGetDataPengunjung()
    {
		$data = Pendaftaran::model()->actionGetDataPengunjung();

		echo json_encode($data);
    }
}
