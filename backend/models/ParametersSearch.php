<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Parameters;

/**
 * ParametersSearch represents the model behind the search form about `backend\models\Parameters`.
 */
class ParametersSearch extends Parameters
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idParameter', 'idUser', 'state'], 'integer'],
            [['name', 'description', 'created_at', 'updated_at', 'parameterCode'], 'safe'],
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
        $query = Parameters::find();

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
            'idParameter' => $this->idParameter,
            'idUser' => $this->idUser,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'state' => $this->state,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'parameterCode', $this->parameterCode]);

        return $dataProvider;
    }
}
