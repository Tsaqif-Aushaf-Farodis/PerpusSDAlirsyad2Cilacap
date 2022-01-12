<?php

namespace app\models;

use Yii;
use \app\models\base\DataBuku as BaseDataBuku;

/**
 * This is the model class for table "data_buku".
 */
class DataBuku extends BaseDataBuku
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
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
        ]);
    }
	
}
