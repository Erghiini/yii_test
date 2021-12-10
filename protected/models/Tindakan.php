<?php

class Tindakan extends CActiveRecord
{

    public function fetch()
    {
        $query = "
            SELECT *
            FROM tindakan
            ORDER BY tindakan_nama ASC
        ";
        return Yii::app()->db->createCommand($query)->queryAll();
    }

    public function add_action()
    {
        $tindakan_nama  = htmlspecialchars($_POST['tindakan_nama'], ENT_QUOTES);

        $query = "
            INSERT INTO tindakan (
                tindakan_nama
            ) VALUES (
                '$tindakan_nama'
            )
        ";
        return Yii::app()->db->createCommand($query)->query();
    }

    public function getTindakanById($id)
    {
        $query = "
            SELECT *
            FROM tindakan
            WHERE tindakan_id = $id
        ";
        return Yii::app()->db->createCommand($query)->queryRow();
    }

    public function validateTindakanNamaById()
    {
        $tindakan_id   = htmlspecialchars($_POST['tindakan_id'], ENT_QUOTES);
        $tindakan_nama = htmlspecialchars($_POST['tindakan_nama'], ENT_QUOTES);
        $query = "
            SELECT count(*) AS jml
            FROM tindakan
            WHERE tindakan_nama = '$tindakan_nama'
                AND tindakan_id != '$tindakan_id'
        ";
        return Yii::app()->db->createCommand($query)->queryRow();
    }

    public function edit_action()
    {
        $tindakan_id    = htmlspecialchars($_POST['tindakan_id'], ENT_QUOTES);
        $tindakan_nama  = htmlspecialchars($_POST['tindakan_nama'], ENT_QUOTES);

        $query = "
            UPDATE tindakan SET
                tindakan_nama  = '$tindakan_nama',
                updated_date   = CURRENT_TIME
            WHERE tindakan_id  = $tindakan_id
        ";
        return Yii::app()->db->createCommand($query)->query();
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tindakan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
