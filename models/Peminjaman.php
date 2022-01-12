<?php

namespace app\models;

use Yii;
use \app\models\base\Peminjaman as BasePeminjaman;

/**
 * This is the model class for table "peminjaman".
 */
class Peminjaman extends BasePeminjaman
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id', 'id_buku', 'tgl_pesan', 'status'], 'required'],
            [['id', 'id_buku'], 'integer'],
            [['tgl_pesan', 'tgl_pinjam', 'tgl_kembali', 'jadwal_tgl_kembali'], 'safe'],
            [['status'], 'string', 'max' => 14]
        ]);
    }
	
}
