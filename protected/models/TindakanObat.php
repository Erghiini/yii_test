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
class TindakanObat extends CActiveRecord
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
                ,   tindakanobat.tindakan_id
                ,   tindakan.tindakan_nama
            FROM pendaftaran
            JOIN pasien
                ON pasien.pasien_id = pendaftaran.pasien_id
            JOIN dokter
                ON dokter.dokter_id = pendaftaran.dokter_id
            JOIN poli
                ON poli.poli_id = dokter.poli_id
            LEFT JOIN tindakanobat
                ON tindakanobat.pendaftaran_id = pendaftaran.pendaftaran_id
            LEFT JOIN tindakan
                ON tindakan.tindakan_id = tindakanobat.tindakan_id
            ORDER BY pendaftaran.created_date DESC
        ";
        return Yii::app()->db->createCommand($query)->queryAll();
    }

    public function add_action()
    {
        $pendaftaran_id         = htmlspecialchars($_POST['pendaftaran_id'], ENT_QUOTES);
        $pendaftaran_diagnosa   = htmlspecialchars($_POST['pendaftaran_diagnosa'], ENT_QUOTES);
        $tindakan_id            = htmlspecialchars($_POST['tindakan_id'], ENT_QUOTES);
        $listObat_id            = $_POST['obat_id'];
        $obat_jumlah            = $_POST['obat_jumlah'];

        $query = "START TRANSACTION; ";

        $query .= "
            UPDATE pendaftaran SET
                pendaftaran_diagnosa = '$pendaftaran_diagnosa',
                pendaftaran_status = 2
            WHERE pendaftaran_id = $pendaftaran_id;
        ";

        $query .= "
            INSERT INTO tindakanobat (
                pendaftaran_id,
                tindakan_id
            ) VALUES (
                $pendaftaran_id,
                $tindakan_id
            )
        ";

        if (count($listObat_id) > 0) {
            $query .= "; INSERT INTO tindakanobat_detail (pendaftaran_id, obat_id, obat_jumlah) VALUES ";
            $koma = "";
            foreach ($listObat_id as $key => $obat_id) {
                $query .= "$koma($pendaftaran_id, $obat_id, $obat_jumlah[$key])";
                $koma   = ",";
            }
        }

        $query .= "
            ; INSERT INTO pembayaran (
                pendaftaran_id,
                pembayaran_total
            ) VALUES (
                $pendaftaran_id,
                (
                    (
                        SELECT
                            sum((tindakanobat_detail.obat_jumlah * obat.obat_harga)) AS total_harga
                        FROM `tindakanobat_detail`
                        JOIN obat
                            ON obat.obat_id = tindakanobat_detail.obat_id
                        WHERE tindakanobat_detail.pendaftaran_id = $pendaftaran_id
                        group by tindakanobat_detail.pendaftaran_id
                    ) + (
                        SELECT poli.poli_harga
                        FROM pendaftaran
                        JOIN dokter 
                            ON dokter.dokter_id = pendaftaran.dokter_id
                        JOIN poli
                            ON poli.poli_id = dokter.poli_id
                        WHERE pendaftaran.pendaftaran_id = $pendaftaran_id
                    )
                )
            );
        ";

        $query .= "COMMIT;";
        Yii::app()->db->createCommand($query)->query();
    }

    public function getPendaftaranById($id)
    {

        $query = "
            SELECT  pendaftaran.*
                ,   pasien.pasien_nama
                ,   pasien.pasien_jk
                ,   pasien.pasien_tempatLahir
                ,   pasien.pasien_tglLahir
                ,   pasien.pasien_alamat
                ,   dokter.dokter_nama
                ,   poli.poli_nama
            FROM pendaftaran
            JOIN pasien
                ON pasien.pasien_id = pendaftaran.pasien_id
            JOIN dokter
                ON dokter.dokter_id = pendaftaran.dokter_id
            JOIN poli
                ON poli.poli_id = dokter.poli_id
            LEFT JOIN tindakanobat
                ON tindakanobat.pendaftaran_id = pendaftaran.pendaftaran_id
            WHERE pendaftaran.pendaftaran_id = $id
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


	//
	// /**
	//  * @return string the associated database table name
	//  */
	// public function tableName()
	// {
	// 	return 'pendaftaran';
	// }
	//
	// /**
	//  * @return array validation rules for model attributes.
	//  */
	// public function rules()
	// {
	// 	// NOTE: you should only define rules for those attributes that
	// 	// will receive user inputs.
	// 	return array(
	// 		array('pendaftaran_nama, pendaftaran_tempatLahir, pendaftaran_tglLahir, pendaftaran_alamat, created_date', 'required'),
	// 		array('pendaftaran_nama, pendaftaran_tempatLahir', 'length', 'max'=>100),
	// 		array('pendaftaran_alamat', 'length', 'max'=>500),
	// 		array('updated_date', 'safe'),
	// 		// The following rule is used by search().
	// 		// @todo Please remove those attributes that should not be searched.
	// 		array('pendaftaran_id, pendaftaran_nama, pendaftaran_tempatLahir, pendaftaran_tglLahir, pendaftaran_alamat, created_date, updated_date', 'safe', 'on'=>'search'),
	// 	);
	// }
	//
	// /**
	//  * @return array relational rules.
	//  */
	// public function relations()
	// {
	// 	// NOTE: you may need to adjust the relation name and the related
	// 	// class name for the relations automatically generated below.
	// 	return array(
	// 	);
	// }
	//
	// /**
	//  * @return array customized attribute labels (name=>label)
	//  */
	// public function attributeLabels()
	// {
	// 	return array(
	// 		'pendaftaran_id' => 'TindakanObat',
	// 		'pendaftaran_nama' => 'TindakanObat Nama',
	// 		'pendaftaran_tempatLahir' => 'TindakanObat Tempat Lahir',
	// 		'pendaftaran_tglLahir' => 'TindakanObat Tgl Lahir',
	// 		'pendaftaran_alamat' => 'TindakanObat Alamat',
	// 		'created_date' => 'Created Date',
	// 		'updated_date' => 'Updated Date',
	// 	);
	// }
	//
	// /**
	//  * Retrieves a list of models based on the current search/filter conditions.
	//  *
	//  * Typical usecase:
	//  * - Initialize the model fields with values from filter form.
	//  * - Execute this method to get CActiveDataProvider instance which will filter
	//  * models according to data in model fields.
	//  * - Pass data provider to CGridView, CListView or any similar widget.
	//  *
	//  * @return CActiveDataProvider the data provider that can return the models
	//  * based on the search/filter conditions.
	//  */
	// public function search()
	// {
	// 	// @todo Please modify the following code to remove attributes that should not be searched.
	//
	// 	$criteria=new CDbCriteria;
	//
	// 	$criteria->compare('pendaftaran_id',$this->pendaftaran_id);
	// 	$criteria->compare('pendaftaran_nama',$this->pendaftaran_nama,true);
	// 	$criteria->compare('pendaftaran_tempatLahir',$this->pendaftaran_tempatLahir,true);
	// 	$criteria->compare('pendaftaran_tglLahir',$this->pendaftaran_tglLahir,true);
	// 	$criteria->compare('pendaftaran_alamat',$this->pendaftaran_alamat,true);
	// 	$criteria->compare('created_date',$this->created_date,true);
	// 	$criteria->compare('updated_date',$this->updated_date,true);
	//
	// 	return new CActiveDataProvider($this, array(
	// 		'criteria'=>$criteria,
	// 	));
	// }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TindakanObat the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
