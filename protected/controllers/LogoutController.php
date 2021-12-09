<?php

class LogoutController extends Controller
{

    public function actionIndex()
    {
        Yii::app()->session->destroy();

		header('Location: '. Yii::app()->request->baseUrl);
    }

}
