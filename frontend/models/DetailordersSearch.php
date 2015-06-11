<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Detailorders;

/**
 * DetailordersSearch represents the model behind the search form about `frontend\models\Detailorders`.
 */
class DetailordersSearch extends Detailorders
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idDetailOrder', 'idOrder', 'idProduct', 'quantityPurchased'], 'integer'],
            [['productName', 'observationDetailorder'], 'safe'],
            [['price'], 'number'],
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
        $query = Detailorders::find();

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
            'idDetailOrder' => $this->idDetailOrder,
            'idOrder' => $this->idOrder,
            'idProduct' => $this->idProduct,
            'quantityPurchased' => $this->quantityPurchased,
            'price' => $this->price,
        ]);

        $query->andFilterWhere(['like', 'productName', $this->productName])
            ->andFilterWhere(['like', 'observationDetailorder', $this->observationDetailorder]);

        return $dataProvider;
    }
}
