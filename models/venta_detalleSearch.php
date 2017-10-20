<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\venta_detalle;

/**
 * venta_detalleSearch represents the model behind the search form about `app\models\venta_detalle`.
 */
class venta_detalleSearch extends venta_detalle
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nombre_producto', 'cantidad', 'precio_unitario', 'vendedor', 'subtotal', 'total', 'venta_detalle'], 'integer'],
            [['fecha'], 'safe'],
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
        $query = venta_detalle::find();

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
            'precio_unitario' => $this->precio_unitario,
            'fecha' => $this->fecha,
            'vendedor' => $this->vendedor,
            'subtotal' => $this->subtotal,
            'total' => $this->total,
            'venta_detalle' => $this->venta_detalle,
        ]);

        return $dataProvider;
    }
}
