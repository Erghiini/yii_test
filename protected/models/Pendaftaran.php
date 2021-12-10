<?php

/**
 * This is the model class for table "pendaftaran".
 *
 * The followings are the available columns in table 'pendaftaran':
 * @property integer $pendaftaran_id
 * @property string $pendaftaran_nama
 * @property string $pendaftaran_tempatLahir
 * @property string $pendaftaran_tglLahir
 * @property string $pendaftaran_alamat
 * @property string $created_date
 * @property string $updated_date
 */
class Pendaftaran extends CActiveRecord
{

    public function fetch()
    {
        $query = "
            SELECT  pendaftaran.*
                ,   pasien.pasien_nama
                ,   pasien.pasien_jk
                ,   pasien.pasien_tempatLahir
                ,   pasien.pasien_tglLahir
                ,   dokter.dokter_nama
                ,   poli.poli_nama
            FROM pendaftaran
            JOIN pasien
                ON pasien.pasien_id = pendaftaran.pasien_id
            JOIN dokter
                ON dokter.dokter_id = pendaftaran.dokter_id
            JOIN poli
                ON poli.poli_id = dokter.poli_id
            ORDER BY created_date DESC
        ";
        return Yii::app()->db->createCommand($query)->queryAll();
    }

    public function add_action()
    {
        $pasien_id                  = htmlspecialchars($_POST['pasien_id'], ENT_QUOTES);
        $dokter_id                  = htmlspecialchars($_POST['dokter_id'], ENT_QUOTES);
        $pendaftaran_keluhan        = htmlspecialchars($_POST['pendaftaran_keluhan'], ENT_QUOTES);
        $pendaftaran_diagnosa       = htmlspecialchars($_POST['pendaftaran_diagnosa'], ENT_QUOTES);

        $query = "
            INSERT INTO pendaftaran (
                pasien_id,
                dokter_id,
                pendaftaran_keluhan,
                pendaftaran_diagnosa,
                pendaftaran_status
            ) VALUES (
                '$pasien_id',
                '$dokter_id',
                '$pendaftaran_keluhan',
                '$pendaftaran_diagnosa',
                '1'
            )
        ";
        return Yii::app()->db->createCommand($query)->query();
    }

    public function getPendaftaranById($id)
    {
        $query = "
            SELECT *
            FROM pendaftaran
            WHERE pendaftaran_id = $id
        ";
        return Yii::app()->db->createCommand($query)->queryRow();
    }

    public function edit_action()
    {
        $pendaftaran_id          = htmlspecialchars($_POST['pendaftaran_id'], ENT_QUOTES);
        $pendaftaran_nama        = htmlspecialchars($_POST['pendaftaran_nama'], ENT_QUOTES);
        $pendaftaran_tempatLahir = htmlspecialchars($_POST['pendaftaran_tempatLahir'], ENT_QUOTES);
        $pendaftaran_tglLahir    = $_POST['pendaftaran_tglLahir'];
        $pendaftaran_jk          = htmlspecialchars($_POST['pendaftaran_jk'], ENT_QUOTES);
        $pendaftaran_alamat      = htmlspecialchars($_POST['pendaftaran_alamat'], ENT_QUOTES);

        $query = "
            UPDATE pendaftaran SET
                pendaftaran_nama        = '$pendaftaran_nama',
                pendaftaran_jk          = '$pendaftaran_jk',
                pendaftaran_tempatLahir = '$pendaftaran_tempatLahir',
                pendaftaran_tglLahir    = '$pendaftaran_tglLahir',
                pendaftaran_alamat      = '$pendaftaran_alamat',
                updated_date       = CURRENT_TIME
            WHERE pendaftaran_id = $pendaftaran_id
        ";
        return Yii::app()->db->createCommand($query)->query();
    }

    public function actionGetDataPengunjung()
    {
        $query = "
            SELECT * FROM ( SELECT DISTINCT(YEAR(pendaftaran_tglKunjungan)) AS tahun, count(*) AS jml FROM pendaftaran ) AS T LIMIT 5
        ";
        return Yii::app()->db->createCommand($query)->queryAll();
    }    

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pendaftaran the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
