<?php

class Wilayah extends CActiveRecord
{

    public function fetch()
    {
        $query = "
            SELECT *
            FROM wilayah
            ORDER BY wilayah_nama ASC
        ";
        return Yii::app()->db->createCommand($query)->queryAll();
    }

    public function validateWilayahNama()
    {
        $wilayah_nama = htmlspecialchars($_POST['wilayah_nama'], ENT_QUOTES);
        $query = "
            SELECT count(*) AS jml
            FROM wilayah
            WHERE wilayah_nama = '$wilayah_nama'
        ";
        return Yii::app()->db->createCommand($query)->queryRow();
    }

    public function add_action()
    {
        $wilayah_nama  = htmlspecialchars($_POST['wilayah_nama'], ENT_QUOTES);

        $query = "
            INSERT INTO wilayah (
                wilayah_nama
            ) VALUES (
                '$wilayah_nama'
            )
        ";
        return Yii::app()->db->createCommand($query)->query();
    }

    public function getWilayahById($id)
    {
        $query = "
            SELECT *
            FROM wilayah
            WHERE wilayah_id = $id
        ";
        return Yii::app()->db->createCommand($query)->queryRow();
    }

    public function validateWilayahNamaById()
    {
        $wilayah_id   = htmlspecialchars($_POST['wilayah_id'], ENT_QUOTES);
        $wilayah_nama = htmlspecialchars($_POST['wilayah_nama'], ENT_QUOTES);
        $query = "
            SELECT count(*) AS jml
            FROM wilayah
            WHERE wilayah_nama  = '$wilayah_nama'
                AND wilayah_id != '$wilayah_id'
        ";
        return Yii::app()->db->createCommand($query)->queryRow();
    }

    public function edit_action()
    {
        $wilayah_id    = htmlspecialchars($_POST['wilayah_id'], ENT_QUOTES);
        $wilayah_nama  = htmlspecialchars($_POST['wilayah_nama'], ENT_QUOTES);

        $query = "
            UPDATE wilayah SET
                wilayah_nama  = '$wilayah_nama',
                updated_date   = CURRENT_TIME
            WHERE wilayah_id  = $wilayah_id
        ";
        return Yii::app()->db->createCommand($query)->query();
    }

    public function hapus_action()
    {
        $wilayah_id    = htmlspecialchars($_POST['id'], ENT_QUOTES);

        $query = "
            DELETE FROM wilayah WHERE wilayah_id  = $wilayah_id
        ";
        return Yii::app()->db->createCommand($query)->query();
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Wilayah the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
