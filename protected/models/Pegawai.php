<?php

/**
 * This is the model class for table "pasien".
 *
 * The followings are the available columns in table 'pasien':
 * @property integer $pasien_id
 * @property string $pasien_nama
 * @property string $pasien_tempatLahir
 * @property string $pasien_tglLahir
 * @property string $pasien_alamat
 * @property string $created_date
 * @property string $updated_date
 */
class Pegawai extends CActiveRecord
{

    public function fetch()
    {
        $query = "
            SELECT *
            FROM pegawai
            ORDER BY created_date DESC
        ";
        return Yii::app()->db->createCommand($query)->queryAll();
    }

    public function add_action()
    {
        $pegawai_nik         = htmlspecialchars($_POST['pegawai_nik'], ENT_QUOTES);
        $pegawai_nama        = htmlspecialchars($_POST['pegawai_nama'], ENT_QUOTES);
        $pegawai_telp        = htmlspecialchars($_POST['pegawai_telp'], ENT_QUOTES);
        $pegawai_tempatLahir = htmlspecialchars($_POST['pegawai_tempatLahir'], ENT_QUOTES);
        $pegawai_tglLahir    = $_POST['pegawai_tglLahir'];
        $pegawai_jk          = htmlspecialchars($_POST['pegawai_jk'], ENT_QUOTES);
        $pegawai_alamat      = htmlspecialchars($_POST['pegawai_alamat'], ENT_QUOTES);

        $query = "
            INSERT INTO pegawai (
                pegawai_nik,
                pegawai_nama,
                pegawai_telp,
                pegawai_tempatLahir,
                pegawai_tglLahir,
                pegawai_alamat,
                pegawai_jk
            ) VALUES (
                '$pegawai_nik',
                '$pegawai_nama',
                '$pegawai_telp',
                '$pegawai_tempatLahir',
                '$pegawai_tglLahir',
                '$pegawai_alamat',
                '$pegawai_jk'
            )
        ";
        return Yii::app()->db->createCommand($query)->query();
    }

    public function getPegawaiById($id)
    {
        $query = "
            SELECT *
            FROM pegawai
            WHERE pegawai_id = $id
        ";
        return Yii::app()->db->createCommand($query)->queryRow();
    }

    public function edit_action()
    {
        $pegawai_id          = htmlspecialchars($_POST['pegawai_id'], ENT_QUOTES);
        $pegawai_nik         = htmlspecialchars($_POST['pegawai_nik'], ENT_QUOTES);
        $pegawai_nama        = htmlspecialchars($_POST['pegawai_nama'], ENT_QUOTES);
        $pegawai_telp        = htmlspecialchars($_POST['pegawai_telp'], ENT_QUOTES);
        $pegawai_tempatLahir = htmlspecialchars($_POST['pegawai_tempatLahir'], ENT_QUOTES);
        $pegawai_tglLahir    = $_POST['pegawai_tglLahir'];
        $pegawai_jk          = htmlspecialchars($_POST['pegawai_jk'], ENT_QUOTES);
        $pegawai_alamat      = htmlspecialchars($_POST['pegawai_alamat'], ENT_QUOTES);

        $query = "
            UPDATE pegawai SET
                pegawai_nik         = '$pegawai_nik',
                pegawai_nama        = '$pegawai_nama',
                pegawai_telp        = '$pegawai_telp',
                pegawai_tempatLahir = '$pegawai_tempatLahir',
                pegawai_tglLahir    = '$pegawai_tglLahir',
                pegawai_alamat      = '$pegawai_alamat',
                pegawai_jk          = '$pegawai_jk',
                updated_date        = CURRENT_TIME
            WHERE pegawai_id = $pegawai_id
        ";
        return Yii::app()->db->createCommand($query)->query();
    }

    public function hapus_action()
    {
        $pegawai_id = htmlspecialchars($_POST['id'], ENT_QUOTES);

        $query = "
            DELETE FROM pegawai
            WHERE pegawai_id = $pegawai_id
        ";
        return Yii::app()->db->createCommand($query)->query();
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pasien the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
