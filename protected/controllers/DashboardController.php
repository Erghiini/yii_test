<?php

if (!isset(Yii::app()->session['userid'])) header('Location: '. Yii::app()->request->baseUrl, 301);

class DashboardController extends Controller
{

    public function actionHome(){
        $this->layout = 'basic';
        $emails = ['test@gmail.com','johndoe@gmail.com'];
        $this->render('view',['emails'=>$emails]);
    }

    public function message( $msg ){
        return $msg;
    }

    public function actionIndex()
    {
        $this->layout = 'basic';
        // $data['events'] = Yii::app()->db->createCommand('SELECT * FROM event')->queryAll(); //Event::model()->findAll();
        $this->render("index");
    }

    public function actionEvents()
    {
        // $this->layout = 'basic';
        // $data['events'] = Yii::app()->db->createCommand('SELECT * FROM event')->queryAll(); //Event::model()->findAll();
        // $this->render("events", $data);
    }

}
