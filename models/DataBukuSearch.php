<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DataBuku;

/**
 * app\models\DataBukuSearch represents the model behind the search form about `app\models\DataBuku`.
 */
 class DataBukuSearch extends DataBuku
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_buku'], 'integer'],
            [['no_barcode', 'tanggal_pengadaan', 'judul_buku', 'jenis_sumber', 'kategori', 'akses', 'ketersediaan', 'lokasi_perpustakaan', 'lokasi_ruang', 'cover_buku'], 'safe'],
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
        $query = DataBuku::find();

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
            'id_buku' => $this->id_buku,
            'tanggal_pengadaan' => $this->tanggal_pengadaan,
        ]);

        $query->andFilterWhere(['like', 'no_barcode', $this->no_barcode])
            ->andFilterWhere(['like', 'judul_buku', $this->judul_buku])
            ->andFilterWhere(['like', 'jenis_sumber', $this->jenis_sumber])
            ->andFilterWhere(['like', 'kategori', $this->kategori])
            ->andFilterWhere(['like', 'akses', $this->akses])
            ->andFilterWhere(['like', 'ketersediaan', $this->ketersediaan])
            ->andFilterWhere(['like', 'lokasi_perpustakaan', $this->lokasi_perpustakaan])
            ->andFilterWhere(['like', 'lokasi_ruang', $this->lokasi_ruang])
            ->andFilterWhere(['like', 'cover_buku', $this->cover_buku]);

        return $dataProvider;
    }
}
