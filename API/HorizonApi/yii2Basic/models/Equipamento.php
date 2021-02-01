<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "equipamento".
 *
 * @property int $id_equipamento_ept
 * @property string $titulo_ept
 * @property float $kilometros_ept
 * @property int $id_utilizador_ept
 *
 * @property Atividade[] $atividades
 * @property Utilizadores $utilizadorEpt
 */
class Equipamento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'equipamento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titulo_ept', 'kilometros_ept', 'id_utilizador_ept'], 'required'],
            [['kilometros_ept'], 'number'],
            [['id_utilizador_ept'], 'integer'],
            [['titulo_ept'], 'string', 'max' => 20],
            [['id_utilizador_ept'], 'exist', 'skipOnError' => true, 'targetClass' => Utilizadores::className(), 'targetAttribute' => ['id_utilizador_ept' => 'id_utilizador_utz']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_equipamento_ept' => 'Id Equipamento Ept',
            'titulo_ept' => 'Titulo Ept',
            'kilometros_ept' => 'Kilometros Ept',
            'id_utilizador_ept' => 'Id Utilizador Ept',
        ];
    }

    /**
     * Gets query for [[Atividades]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAtividades()
    {
        return $this->hasMany(Atividade::className(), ['id_equipamento_atv' => 'id_equipamento_ept']);
    }

    /**
     * Gets query for [[UtilizadorEpt]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUtilizadorEpt()
    {
        return $this->hasOne(Utilizadores::className(), ['id_utilizador_utz' => 'id_utilizador_ept']);
    }
}
