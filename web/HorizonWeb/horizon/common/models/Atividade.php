<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "atividade".
 *
 * @property int $id_atividade_atv
 * @property string|null $data_atv
 * @property string $start_atv
 * @property float $distancia_atv
 * @property float $elevacao_atv
 * @property float $velocidade_media_atv
 * @property float $likes_atv
 * @property string $tempo_atv
 * @property int $id_equipamento_atv
 * @property int $id_user_atv
 * @property string $titulo_atv
 *
 * @property User $userAtv
 * @property Comentarios[] $comentarios
 * @property Foto[] $fotos
 * @property Locaisinteressante[] $locaisinteressantes
 */
class Atividade extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'atividade';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data_atv', 'start_atv', 'tempo_atv'], 'safe'],
            [['start_atv', 'distancia_atv', 'elevacao_atv', 'velocidade_media_atv', 'likes_atv', 'tempo_atv', 'id_equipamento_atv', 'id_user_atv', 'titulo_atv'], 'required'],
            [['distancia_atv', 'elevacao_atv', 'velocidade_media_atv', 'likes_atv'], 'number'],
            [['id_equipamento_atv', 'id_user_atv'], 'integer'],
            [['titulo_atv'], 'string', 'max' => 100],
            [['id_user_atv'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user_atv' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_atividade_atv' => 'Id Atividade Atv',
            'data_atv' => 'Data',
            'start_atv' => 'Inicio_atividade',
            'distancia_atv' => 'Distancia',
            'elevacao_atv' => 'Elevacao',
            'velocidade_media_atv' => 'Velocidade_Media',
            'likes_atv' => 'Likes',
            'tempo_atv' => 'Tempo',
            'id_equipamento_atv' => 'Id_Equipamento',
            'id_user_atv' => 'Id_User',
            'titulo_atv' => 'Titulo',
        ];
    }

    /**
     * Gets query for [[UserAtv]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserAtv()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user_atv']);
    }

    /**
     * Gets query for [[Comentarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComentarios()
    {
        return $this->hasMany(Comentarios::className(), ['id_atividade_com' => 'id_atividade_atv']);
    }

    /**
     * Gets query for [[Fotos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFotos()
    {
        return $this->hasMany(Foto::className(), ['id_atividade_ft' => 'id_atividade_atv']);
    }

    /**
     * Gets query for [[Locaisinteressantes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLocaisinteressantes()
    {
        return $this->hasMany(Locaisinteressante::className(), ['id_atividade_loc' => 'id_atividade_atv']);
    }
}
