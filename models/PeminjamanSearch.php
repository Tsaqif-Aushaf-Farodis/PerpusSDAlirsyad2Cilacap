<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Peminjaman;

/**
 * app\models\PeminjamanSearch represents the model behind the search form about `app\models\Peminjaman`.
 */
 class PeminjamanSearch extends Peminjaman
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode_peminjaman', 'id', 'id_buku'], 'integer'],
            [['tgl_pesan', 'tgl_pinjam', 'tgl_kembali', 'status', 'jadwal_tgl_kembali'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Peminjaman::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'kode_peminjaman' => $this->kode_peminjaman,
            'id' => $this->id,
            'id_buku' => $this->id_buku,
            'tgl_pesan' => $this->tgl_pesan,
            'tgl_pinjam' => $this->tgl_pinjam,
            'tgl_kembali' => $this->tgl_kembali,
            'jadwal_tgl_kembali' => $this->jadwal_tgl_kembali,
        ]);

        $query->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
