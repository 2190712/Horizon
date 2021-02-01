<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "equipamento".
 *
 * @property int $id_equipamento_ept
 * @property string $titulo_ept
 * @property float $kilometros_ept
 * @property int $id_user_ept
 *
 * @property User $userEpt
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
            [['titulo_ept', 'kilometros_ept', 'id_user_ept'], 'required'],
            [['kilometros_ept'], 'number'],
            [['id_user_ept'], 'integer'],
            [['titulo_ept'], 'string', 'max' => 20],
            [['id_user_ept'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user_ept' => 'id']],
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
            'id_user_ept' => 'Id User Ept',
        ];
    }

    /**
     * Gets query for [[UserEpt]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserEpt()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user_ept']);
    }
}
