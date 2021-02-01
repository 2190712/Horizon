<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Atividade;

/**
 * AtividadeSearch represents the model behind the search form of `common\models\Atividade`.
 */
class AtividadeSearch extends Atividade
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_atividade_atv', 'id_equipamento_atv', 'id_user_atv'], 'integer'],
            [['data_atv', 'start_atv', 'tempo_atv', 'titulo_atv'], 'safe'],
            [['distancia_atv', 'elevacao_atv', 'velocidade_media_atv', 'likes_atv'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Atividade::find();

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
            'id_atividade_atv' => $this->id_atividade_atv,
            'data_atv' => $this->data_atv,
            'start_atv' => $this->start_atv,
            'distancia_atv' => $this->distancia_atv,
            'elevacao_atv' => $this->elevacao_atv,
            'velocidade_media_atv' => $this->velocidade_media_atv,
            'likes_atv' => $this->likes_atv,
            'tempo_atv' => $this->tempo_atv,
            'id_equipamento_atv' => $this->id_equipamento_atv,
            'id_user_atv' => $this->id_user_atv,
        ]);

        $query->andFilterWhere(['like', 'titulo_atv', $this->titulo_atv]);

        return $dataProvider;
    }
}
