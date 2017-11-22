<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\compra;


/**
 * CompraSearch represents the model behind the search form about `app\models\compra`.
 */
class CompraSearch extends compra
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['proveedor','fecha_compra', 'compra', 'comprobante', 'ingresado_por', 'anulado'], 'safe'],
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
        $query = compra::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'fecha_compra' => $this->fecha_compra,
            'proveedor' => $this->proveedor,
        ]);

        $query->andFilterWhere(['like', 'compra', $this->compra])
            ->andFilterWhere(['like', 'comprobante', $this->comprobante])
            ->andFilterWhere(['like', 'ingresado_por', $this->ingresado_por])
            ->andFilterWhere(['like', 'anulado', $this->anulado]);

        return $dataProvider;
    }
}
