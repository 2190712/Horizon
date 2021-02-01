<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "comentarios".
 *
 * @property int $id_comentario_com
 * @property string $data_com
 * @property string $hora_com
 * @property string $comentario_com
 * @property int $id_user_com
 * @property int $id_atividade_com
 *
 * @property Atividade $atividadeCom
 * @property User $userCom
 */
class Comentarios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comentarios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data_com', 'hora_com', 'comentario_com', 'id_user_com', 'id_atividade_com'], 'required'],
            [['data_com', 'hora_com'], 'safe'],
            [['comentario_com'], 'string'],
            [['id_user_com', 'id_atividade_com'], 'integer'],
            [['id_atividade_com'], 'exist', 'skipOnError' => true, 'targetClass' => Atividade::className(), 'targetAttribute' => ['id_atividade_com' => 'id_atividade_atv']],
            [['id_user_com'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user_com' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_comentario_com' => 'Id Comentario Com',
            'data_com' => 'Data Com',
            'hora_com' => 'Hora Com',
            'comentario_com' => 'Comentario Com',
            'id_user_com' => 'Id User Com',
            'id_atividade_com' => 'Id Atividade Com',
        ];
    }

    /**
     * Gets query for [[AtividadeCom]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAtividadeCom()
    {
        return $this->hasOne(Atividade::className(), ['id_atividade_atv' => 'id_atividade_com']);
    }

    /**
     * Gets query for [[UserCom]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserCom()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user_com']);
    }
}
