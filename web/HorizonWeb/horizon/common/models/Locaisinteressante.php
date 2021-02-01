<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "locaisinteressante".
 *
 * @property int $id_local_loc
 * @property string $titulo_loc
 * @property string $rua_loc
 * @property string $localidade_loc
 * @property string $coordenadas_loc
 * @property string|null $data_loc
 * @property string $pais_loc
 * @property string|null $comentario_loc

 *
 * @property Atividade $atividadeLoc
 */
class Locaisinteressante extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'locaisinteressante';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_local_loc', 'titulo_loc', 'rua_loc', 'localidade_loc', 'coordenadas_loc', 'pais_loc'], 'required'],
            [['id_local_loc'], 'integer'],
            [['data_loc'], 'safe'],
            [['comentario_loc'], 'string'],
            [['titulo_loc', 'localidade_loc', 'pais_loc'], 'string', 'max' => 20],
            [['rua_loc'], 'string', 'max' => 80],
            [['coordenadas_loc'], 'string', 'max' => 30],
            [['id_local_loc'], 'unique'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_local_loc' => 'Id Local Loc',
            'titulo_loc' => 'Titulo Loc',
            'rua_loc' => 'Rua Loc',
            'localidade_loc' => 'Localidade Loc',
            'coordenadas_loc' => 'Coordenadas Loc',
            'data_loc' => 'Data Loc',
            'pais_loc' => 'Pais Loc',
            'comentario_loc' => 'Comentario Loc',

        ];
    }

    /**
     * Gets query for [[AtividadeLoc]].
     *
     * @return \yii\db\ActiveQuery
     */

}
