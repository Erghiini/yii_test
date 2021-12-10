<?php

if (!isset(Yii::app()->session['userid'])) header('Location: '. Yii::app()->request->baseUrl, 301);

class DashboardController extends Controller
{

    public function actionIndex()
    {
        $this->layout = 'basic';
        $this->render("index");
    }

}
