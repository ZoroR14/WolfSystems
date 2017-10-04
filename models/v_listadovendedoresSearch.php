<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\v_listadovendedores;

/**
 * v_listadovendedoresSearch represents the model behind the search form about `app\models\v_listadovendedores`.
 */
class v_listadovendedoresSearch extends v_listadovendedores
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'telefono', 'celular'], 'integer'],
            [['nombre', 'cedula', 'email', 'fecha_recibido', 'fecha_entrega', 'recibe', 'descripcion'], 'safe'],
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
        $query = v_listadovendedores::find();

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
            'id' => $this->id,
            'telefono' => $this->telefono,
            'celular' => $this->celular,
            'fecha_recibido' => $this->fecha_recibido,
            'fecha_entrega' => $this->fecha_entrega,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'cedula', $this->cedula])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'recibe', $this->recibe])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
