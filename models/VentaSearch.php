<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Venta;

/**
 * VentaSearch represents the model behind the search form about `app\models\Venta`.
 */
class VentaSearch extends Venta
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'celular', 'telefono', 'vendedor'], 'integer'],
            [['nombre_cliente', 'direccion', 'fecha'], 'safe'],
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
        $query = Venta::find();

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
            'celular' => $this->celular,
            'telefono' => $this->telefono,
            'vendedor' => $this->vendedor,
            'fecha' => $this->fecha,
        ]);

        $query->andFilterWhere(['like', 'nombre_cliente', $this->nombre_cliente])
            ->andFilterWhere(['like', 'direccion', $this->direccion]);

        return $dataProvider;
    }
}
