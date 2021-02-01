<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $role
 * @property int $created_at
 * @property int $updated_at
 * @property string|null $verification_token
 * @property string $primeiro
 * @property string $apelido
 * @property int $telemovel
 * @property int $idade
 * @property string $genero
 * @property float $distancia_total
 * @property int $n_volta_total
 * @property float $ganho_elevacao
 * @property float $maior_volta
 * @property float $n_corridas
 * @property float $tempo_total
 *
 * @property Atividade[] $atividades
 * @property Comentarios[] $comentarios
 * @property Equipamento[] $equipamentos
 * @property PerfilUtilizador[] $perfilUtilizadors
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at', 'primeiro', 'apelido', 'telemovel', 'idade', 'genero', 'distancia_total', 'n_volta_total', 'ganho_elevacao', 'maior_volta', 'n_corridas', 'tempo_total'], 'required'],
            [['status', 'role', 'created_at', 'updated_at', 'telemovel', 'idade', 'n_volta_total'], 'integer'],
            [['distancia_total', 'ganho_elevacao', 'maior_volta', 'n_corridas', 'tempo_total'], 'number'],
            [['username', 'password_hash', 'password_reset_token', 'email', 'verification_token'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['primeiro', 'apelido'], 'string', 'max' => 20],
            [['genero'], 'string', 'max' => 10],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'role' => 'Role',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'verification_token' => 'Verification Token',
            'primeiro' => 'Primeiro',
            'apelido' => 'Apelido',
            'telemovel' => 'Telemovel',
            'idade' => 'Idade',
            'genero' => 'Genero',
            'distancia_total' => 'Distancia Total',
            'n_volta_total' => 'N Volta Total',
            'ganho_elevacao' => 'Ganho Elevacao',
            'maior_volta' => 'Maior Volta',
            'n_corridas' => 'N Corridas',
            'tempo_total' => 'Tempo Total',
        ];
    }

    /**
     * Gets query for [[Atividades]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAtividades()
    {
        return $this->hasMany(Atividade::className(), ['id_user_atv' => 'id']);
    }

    /**
     * Gets query for [[Comentarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComentarios()
    {
        return $this->hasMany(Comentarios::className(), ['id_user_com' => 'id']);
    }

    /**
     * Gets query for [[Equipamentos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEquipamentos()
    {
        return $this->hasMany(Equipamento::className(), ['id_user_ept' => 'id']);
    }

    /**
     * Gets query for [[PerfilUtilizadors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPerfilUtilizadors()
    {
        return $this->hasMany(PerfilUtilizador::className(), ['id_user_per' => 'id']);
    }
}
