<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Products;

/**
 * ProductsSearch represents the model behind the search form about `backend\models\Products`.
 */
class ProductsSearch extends Products
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idProduct', 'idUser', 'idUnit', 'taxes'], 'integer'],
            [['name', 'description', 'nameUnit', 'created_at', 'updated_at'], 'safe'],
            [['quantityPurchased', 'amountSold', 'remainingAmount', 'price'], 'number'],
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
        $query = Products::find();

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
            'idProduct' => $this->idProduct,
            'idUser' => $this->idUser,
            'quantityPurchased' => $this->quantityPurchased,
            'amountSold' => $this->amountSold,
            'remainingAmount' => $this->remainingAmount,
            'idUnit' => $this->idUnit,
            'price' => $this->price,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'taxes' => $this->taxes,
            'image' => $this->image,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'nameUnit', $this->nameUnit])
            ->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }
}
