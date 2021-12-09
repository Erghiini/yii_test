<?php

class LoginController extends Controller
{

    public function actionIndex()
    {
        if (isset(Yii::app()->session['userid'])) header('Location: '. Yii::app()->request->baseUrl . '/dashboard', 301);

		$this->layout = '/';
		$this->render('index');
    }

    public function actionLogin_action()
    {
		$data = User::model()->cekUserLogin();

        if (isset($data['user_id'])) {
            Yii::app()->session['userid']        = $data['user_id'];
            Yii::app()->session['username']     = $data['user_name'];
            Yii::app()->session['userlevel']     = $data['user_level'];
            
            header('Location: '. Yii::app()->request->baseUrl .'/dashboard');
        } else {
            Yii::app()->user->setFlash('notice', "Username atau Password Salah!");
            header('Location: '. Yii::app()->request->baseUrl);
        }

    }

}
