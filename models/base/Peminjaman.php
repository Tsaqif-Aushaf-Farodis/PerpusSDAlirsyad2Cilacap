<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "peminjaman".
 *
 * @property integer $kode_peminjaman
 * @property integer $user_id
 * @property integer $id_buku
 * @property string $tgl_pinjam
 * @property string $tgl_kembali
 * @property integer $jadwal_tgl_kembali
 * @property string $status
 *
 * @property \app\models\DataBuku $buku
 * @property \app\models\Users $user
 */
class Peminjaman extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'buku',
            'user'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_buku', 'tgl_pesan', 'status'], 'required'],
            [['id', 'id_buku'], 'integer'],
            [['tgl_pesan', 'tgl_pinjam', 'tgl_kembali', 'jadwal_tgl_kembali'], 'safe'],
            [['status'], 'string', 'max' => 14]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'peminjaman';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kode_peminjaman' => 'Kode Peminjaman',
            'id' => 'Nama',
            'id_buku' => 'Judul Buku',
            'tgl_pesan' => 'Tgl Pesan',
            'tgl_pinjam' => 'Tgl Pinjam',
            'tgl_kembali' => 'Tgl Kembali',
            'jadwal_tgl_kembali' => 'Jadwal Tgl Kembali',
            'status' => 'Status',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBuku()
    {
        return $this->hasOne(\app\models\DataBuku::className(), ['id_buku' => 'id_buku']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\webvimark\modules\UserManagement\models\User::className(), ['id' => 'id']);
    }
    

    /**
     * @inheritdoc
     * @return \app\models\PeminjamanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\PeminjamanQuery(get_called_class());
    }
}
