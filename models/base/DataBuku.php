<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "data_buku".
 *
 * @property integer $id_buku
 * @property string $no_barcode
 * @property string $tanggal_pengadaan
 * @property string $judul_buku
 * @property string $jenis_sumber
 * @property string $kategori
 * @property string $akses
 * @property string $ketersediaan
 * @property string $lokasi_perpustakaan
 * @property string $lokasi_ruang
 */
class DataBuku extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    // public function relationNames()
    // {
    //     return [
    //         ''
    //     ];
    // }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_buku', 'no_barcode', 'tanggal_pengadaan', 'judul_buku', 'jenis_sumber', 'kategori', 'akses', 'ketersediaan', 'lokasi_perpustakaan', 'lokasi_ruang'], 'required'],
            [['id_buku'], 'integer'],
            [['tanggal_pengadaan'], 'safe'],
            [['no_barcode'], 'string', 'max' => 20],
            [['judul_buku'], 'string', 'max' => 100],
            [['lokasi_perpustakaan'], 'string', 'max' => 50],
            [['jenis_sumber'], 'string', 'max' => 12],
            [['kategori'], 'string', 'max' => 17],
            [['akses', 'ketersediaan'], 'string', 'max' => 14],
            [['lokasi_ruang'], 'string', 'max' => 23],
            [['cover_buku'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'data_buku';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_buku' => 'Id Buku',
            'no_barcode' => 'No Barcode',
            'tanggal_pengadaan' => 'Tanggal Pengadaan',
            'judul_buku' => 'Judul Buku',
            'jenis_sumber' => 'Jenis Sumber',
            'kategori' => 'Kategori',
            'akses' => 'Akses',
            'ketersediaan' => 'Ketersediaan',
            'lokasi_perpustakaan' => 'Lokasi Perpustakaan',
            'lokasi_ruang' => 'Lokasi Ruang',
            'cover_buku' => 'Cover'
        ];
    }


    /**
     * @inheritdoc
     * @return \app\models\DataBukuQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\DataBukuQuery(get_called_class());
    }
}
