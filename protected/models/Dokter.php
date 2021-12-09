<?php

class Dokter extends CActiveRecord
{
    public function fetch()
    {
        $query = "
            SELECT  dokter.*
                ,   poli.poli_nama
            FROM dokter
            JOIN poli
                ON poli.poli_id = dokter.poli_id
            ORDER BY created_date DESC
        ";
        return Yii::app()->db->createCommand($query)->queryAll();
    }

    public function add_action()
    {
        $dokter_nomor_str   = htmlspecialchars($_POST['dokter_nomor_str'], ENT_QUOTES);
        $poli_id            = htmlspecialchars($_POST['poli_id'], ENT_QUOTES);
        $dokter_nama        = htmlspecialchars($_POST['dokter_nama'], ENT_QUOTES);
        $dokter_jk          = htmlspecialchars($_POST['dokter_jk'], ENT_QUOTES);
        $dokter_tempatLahir = htmlspecialchars($_POST['dokter_tempatLahir'], ENT_QUOTES);
        $dokter_tglLahir    = $_POST['dokter_tglLahir'];
        $dokter_alamat      = htmlspecialchars($_POST['dokter_alamat'], ENT_QUOTES);
        $dokter_keterangan  = htmlspecialchars($_POST['dokter_keterangan'], ENT_QUOTES);

        $query = "
            INSERT INTO dokter (
                dokter_nomor_str,
                poli_id,
                dokter_nama,
                dokter_jk,
                dokter_tempatLahir,
                dokter_tglLahir,
                dokter_alamat,
                dokter_keterangan
            ) VALUES (
                '$dokter_nomor_str',
                '$poli_id',
                '$dokter_nama',
                '$dokter_jk',
                '$dokter_tempatLahir',
                '$dokter_tglLahir',
                '$dokter_alamat',
                '$dokter_keterangan'
            )
        ";
        return Yii::app()->db->createCommand($query)->query();
    }

    public function getDokterById($id = '')
    {
        $query = "
            SELECT *
            FROM dokter
            WHERE dokter_id = $id
        ";
        return Yii::app()->db->createCommand($query)->queryRow();
    }

    public function getDokterByNomorSTR($nomor_str = '')
    {
        $query = "
            SELECT *
            FROM dokter
            WHERE dokter_nomor_str = '$nomor_str'
        ";
        
        return Yii::app()->db->createCommand($query)->queryRow();
    }

    public function edit_action()
    {
        $dokter_id          = htmlspecialchars($_POST['dokter_id'], ENT_QUOTES);
        $dokter_nomor_str   = htmlspecialchars($_POST['dokter_nomor_str'], ENT_QUOTES);
        $poli_id            = htmlspecialchars($_POST['poli_id'], ENT_QUOTES);
        $dokter_nama        = htmlspecialchars($_POST['dokter_nama'], ENT_QUOTES);
        $dokter_jk          = htmlspecialchars($_POST['dokter_jk'], ENT_QUOTES);
        $dokter_tempatLahir = htmlspecialchars($_POST['dokter_tempatLahir'], ENT_QUOTES);
        $dokter_tglLahir    = $_POST['dokter_tglLahir'];
        $dokter_alamat      = htmlspecialchars($_POST['dokter_alamat'], ENT_QUOTES);
        $dokter_keterangan  = htmlspecialchars($_POST['dokter_keterangan'], ENT_QUOTES);

        $query = "
            UPDATE dokter SET
                dokter_nomor_str    = '$dokter_nomor_str',
                poli_id             = '$poli_id',
                dokter_nama         = '$dokter_nama',
                dokter_jk           = '$dokter_jk',
                dokter_tempatLahir  = '$dokter_tempatLahir',
                dokter_tglLahir     = '$dokter_tglLahir',
                dokter_alamat       = '$dokter_alamat',
                dokter_keterangan   = '$dokter_keterangan',
                updated_date        = CURRENT_TIME
            WHERE dokter_id = $dokter_id
        ";
        return Yii::app()->db->createCommand($query)->query();
    }

    public function actionGetDokterByPoliId()
    {
        $poli_id = $_POST['poli_id'];

        $query = "
            SELECT  dokter.dokter_id
                ,   dokter.dokter_nama
            FROM dokter
            JOIN poli
                ON poli.poli_id = dokter.poli_id
            WHERE poli.poli_id = $poli_id
            ORDER BY dokter.dokter_nama ASC
        ";
        return Yii::app()->db->createCommand($query)->queryAll();
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Dokter the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
