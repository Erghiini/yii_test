<?php

class Obat extends CActiveRecord
{

    public function fetch()
    {
        $query = "
            SELECT *
            FROM obat
            ORDER BY obat_nama ASC
        ";
        return Yii::app()->db->createCommand($query)->queryAll();
    }

    public function getObatByName($obat_nama = '')
    {
        $query = "
            SELECT *
            FROM obat
            WHERE obat_nama = '$obat_nama'
        ";
        $result = Yii::app()->db->createCommand($query)->queryRow();
        return $result;
    }

    public function actionGetObatByName()
    {
        $search = trim($_GET['search']);

        $query = "
            SELECT *
            FROM obat
            WHERE obat_nama LIKE '%$search%'
            ORDER BY obat_nama ASC
            LIMIT 50
        ";
        $result = Yii::app()->db->createCommand($query)->queryAll();

        $data = array();
        foreach ($result as $d) {
            $obat_id   = trim($d['obat_id']);
            $obat_nama = trim($d['obat_nama']);

            array_push($data, array(
                'id'    => $obat_id,
                'text'  => $obat_nama
            ));
        }

        return $data;
    }

    public function add_action()
    {
        $obat_nama			= htmlspecialchars($_POST['obat_nama'], ENT_QUOTES);
        $obat_harga			= htmlspecialchars($_POST['obat_harga'], ENT_QUOTES);
        $obat_keterangan	= htmlspecialchars($_POST['obat_keterangan'], ENT_QUOTES);

        $query = "
            INSERT INTO obat (
                obat_nama,
                obat_harga,
                obat_keterangan
            ) VALUES (
                '$obat_nama',
                '$obat_harga',
                '$obat_keterangan'
            )
        ";
        return Yii::app()->db->createCommand($query)->query();
    }

    public function getObatById($obat_id)
    {
        $query = "
            SELECT *
            FROM obat
            WHERE obat_id = $obat_id
        ";
        $result = Yii::app()->db->createCommand($query)->queryRow();
        return $result;
    }

    public function edit_action()
    {
        $obat_id			= htmlspecialchars($_POST['obat_id'], ENT_QUOTES);
        $obat_nama			= htmlspecialchars($_POST['obat_nama'], ENT_QUOTES);
        $obat_harga			= htmlspecialchars($_POST['obat_harga'], ENT_QUOTES);
        $obat_keterangan	= htmlspecialchars($_POST['obat_keterangan'], ENT_QUOTES);

        $query = "
            UPDATE obat SET
                obat_nama 		= '$obat_nama',
                obat_harga 		= '$obat_harga',
                obat_keterangan = '$obat_keterangan'
            WHERE obat_id = $obat_id
        ";
        return Yii::app()->db->createCommand($query)->query();
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Obat the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
