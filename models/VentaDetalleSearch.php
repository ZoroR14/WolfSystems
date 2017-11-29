<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\VentaDetalle;

/**
 * VentaDetalleSearch represents the model behind the search form about `app\models\VentaDetalle`.
 */
class VentaDetalleSearch extends VentaDetalle
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nombre_producto', 'cantidad', 'subtotal', 'total', 'venta_id'], 'integer'],
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
        $query = VentaDetalle::find();

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
            'nombre_producto' => $this->nombre_producto,
            'cantidad' => $this->cantidad,
            'subtotal' => $this->subtotal,
            'total' => $this->total,
            'venta_id' => $this->venta_id,
        ]);

        return $dataProvider;
    }
}
