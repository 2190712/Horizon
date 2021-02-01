<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "foto".
 *
 * @property int $id_foto_ft
 * @property resource $foto_ft
 * @property string $data_ft
 * @property string $hora_ft
 * @property int $id_atividade_ft
 *
 * @property Atividade $atividadeFt
 */
class Foto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'foto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['foto_ft', 'data_ft', 'hora_ft', 'id_atividade_ft'], 'required'],
            [['foto_ft'], 'string'],
            [['data_ft', 'hora_ft'], 'safe'],
            [['id_atividade_ft'], 'integer'],
            [['id_atividade_ft'], 'exist', 'skipOnError' => true, 'targetClass' => Atividade::className(), 'targetAttribute' => ['id_atividade_ft' => 'id_atividade_atv']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_foto_ft' => 'Id Foto Ft',
            'foto_ft' => 'Foto Ft',
            'data_ft' => 'Data Ft',
            'hora_ft' => 'Hora Ft',
            'id_atividade_ft' => 'Id Atividade Ft',
        ];
    }

    /**
     * Gets query for [[AtividadeFt]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAtividadeFt()
    {
        return $this->hasOne(Atividade::className(), ['id_atividade_atv' => 'id_atividade_ft']);
    }
}
