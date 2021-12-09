<?php

class Poli extends CActiveRecord
{

    public function fetch()
    {
        $query = "
            SELECT *
            FROM poli
            ORDER BY created_date DESC
        ";
        return Yii::app()->db->createCommand($query)->queryAll();
    }

    public function add_action()
    {
        $poli_nama       	= htmlspecialchars($_POST['poli_nama'], ENT_QUOTES);
        $poli_harga       	= htmlspecialchars($_POST['poli_harga'], ENT_QUOTES);
        $poli_keterangan	= htmlspecialchars($_POST['poli_keterangan'], ENT_QUOTES);

        $query = "
            INSERT INTO poli (
                poli_nama,
                poli_harga,
                poli_keterangan
            ) VALUES (
                '$poli_nama',
                '$poli_harga',
                '$poli_keterangan'
            )
        ";
        return Yii::app()->db->createCommand($query)->query();
    }

    public function getPoliById($id)
    {
        $query = "
            SELECT *
            FROM poli
            WHERE poli_id = $id
        ";
        return Yii::app()->db->createCommand($query)->queryRow();
    }

    public function edit_action()
    {
        $poli_id          	= htmlspecialchars($_POST['poli_id'], ENT_QUOTES);
        $poli_nama       	= htmlspecialchars($_POST['poli_nama'], ENT_QUOTES);
        $poli_harga       	= htmlspecialchars($_POST['poli_harga'], ENT_QUOTES);
        $poli_keterangan 	= htmlspecialchars($_POST['poli_keterangan'], ENT_QUOTES);

        $query = "
            UPDATE poli SET
                poli_nama       = '$poli_nama',
                poli_harga      = '$poli_harga',
                poli_keterangan = '$poli_keterangan',
                updated_date    = CURRENT_TIME
            WHERE poli_id = $poli_id
        ";
        return Yii::app()->db->createCommand($query)->query();
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Poli the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
