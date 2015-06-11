<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Packagescontrol;

/**
 * PackagescontrolSearch represents the model behind the search form about `backend\models\Packagescontrol`.
 */
class PackagescontrolSearch extends Packagescontrol
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idPackage', 'idUser', 'idFreight', 'idOrder', 'packageState'], 'integer'],
            [['nameName', 'description', 'created_at', 'updated_at', 'observations','nameState'], 'safe'],
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
        $query = Packagescontrol::find();

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
            'idPackage' => $this->idPackage,
            'idUser' => $this->idUser,
            'idFreight' => $this->idFreight,
            'idOrder' => $this->idOrder,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'packageState' => $this->packageState,
            'nameState' => $this->nameState,
        ]);

        $query->andFilterWhere(['like', 'nameName', $this->nameName])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'observations', $this->observations]);

        return $dataProvider;
    }
}
