<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\proveedor;

/**
 * proveedorSearch represents the model behind the search form about `app\models\proveedor`.
 */
class proveedorSearch extends proveedor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'telefono', 'celular'], 'integer'],
            [['nombre', 'cedula', 'empresa', 'notas'], 'safe'],
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
        $query = proveedor::find();

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
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'cedula', $this->cedula])
            ->andFilterWhere(['like', 'empresa', $this->empresa])
            ->andFilterWhere(['like', 'notas', $this->notas]);

        return $dataProvider;
    }
}
