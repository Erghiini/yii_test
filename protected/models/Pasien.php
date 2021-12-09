<?php

class Pasien extends CActiveRecord
{

    public function fetch()
    {
        $query = "
            SELECT *
            FROM pasien
            ORDER BY created_date DESC
        ";
        return Yii::app()->db->createCommand($query)->queryAll();
    }

    public function add_action()
    {
        $pasien_nama        = htmlspecialchars($_POST['pasien_nama'], ENT_QUOTES);
        $pasien_tempatLahir = htmlspecialchars($_POST['pasien_tempatLahir'], ENT_QUOTES);
        $pasien_tglLahir    = $_POST['pasien_tglLahir'];
        $pasien_jk          = htmlspecialchars($_POST['pasien_jk'], ENT_QUOTES);
        $pasien_alamat      = htmlspecialchars($_POST['pasien_alamat'], ENT_QUOTES);

        $query = "
            INSERT INTO pasien (
                pasien_nama,
                pasien_tempatLahir,
                pasien_tglLahir,
                pasien_jk,
                pasien_alamat
            ) VALUES (
                '$pasien_nama',
                '$pasien_tempatLahir',
                '$pasien_tglLahir',
                '$pasien_jk',
                '$pasien_alamat'
            )
        ";
        return Yii::app()->db->createCommand($query)->query();
    }

    public function getPasienById($id)
    {
        $query = "
            SELECT *
            FROM pasien
            WHERE pasien_id = $id
        ";
        return Yii::app()->db->createCommand($query)->queryRow();
    }

    public function edit_action()
    {
        $pasien_id          = htmlspecialchars($_POST['pasien_id'], ENT_QUOTES);
        $pasien_nama        = htmlspecialchars($_POST['pasien_nama'], ENT_QUOTES);
        $pasien_tempatLahir = htmlspecialchars($_POST['pasien_tempatLahir'], ENT_QUOTES);
        $pasien_tglLahir    = $_POST['pasien_tglLahir'];
        $pasien_jk          = htmlspecialchars($_POST['pasien_jk'], ENT_QUOTES);
        $pasien_alamat      = htmlspecialchars($_POST['pasien_alamat'], ENT_QUOTES);

        $query = "
            UPDATE pasien SET
                pasien_nama        = '$pasien_nama',
                pasien_jk          = '$pasien_jk',
                pasien_tempatLahir = '$pasien_tempatLahir',
                pasien_tglLahir    = '$pasien_tglLahir',
                pasien_alamat      = '$pasien_alamat',
                updated_date       = CURRENT_TIME
            WHERE pasien_id = $pasien_id
        ";
        return Yii::app()->db->createCommand($query)->query();
    }

    public function actionGetPasienByName()
    {
        $search = $_GET['search'];

        $query = "
            SELECT *
            FROM pasien
            WHERE pasien_nama LIKE '%$search%'
        ";
        $result = Yii::app()->db->createCommand($query)->queryAll();

        $data = array();
        foreach ($result as $d) {
            $pasien_id   = trim($d['pasien_id']);
            $pasien_nama = trim($d['pasien_nama']);
            $pasien_tempatLahir = trim($d['pasien_tempatLahir']);
            $pasien_tglLahir = trim($d['pasien_tglLahir']);
            $pasien_alamat = trim($d['pasien_alamat']);

            array_push($data, array(
                'id'    => $pasien_id,
                'text'  => $pasien_nama .' - '. $pasien_alamat,
                'pasien_tempatLahir'  => $pasien_tempatLahir,
                'pasien_tglLahir'  => $pasien_tglLahir,
                'pasien_alamat'  => $pasien_alamat
            ));
        }

        return $data;
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
