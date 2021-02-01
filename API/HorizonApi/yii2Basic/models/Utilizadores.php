<?php

namespace app\models;

use Yii;


/**
 * This is the model class for table "utilizadores".
 *
 * @property int $id_utilizador_utz
 * @property string $primeiro
 * @property string $apelido
 * @property int $telemovel
 * @property int $idade
 * @property string $genero
 * @property int $administrador
 * @property float $distancia_total
 * @property float $n_volta_total
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
class Utilizadores extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'utilizadores';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['primeiro', 'apelido', 'telemovel', 'idade', 'genero', 'administrador', 'distancia_total', 'n_volta_total', 'ganho_elevacao', 'maior_volta', 'n_corridas', 'tempo_total'], 'required'],
            [['telemovel', 'idade', 'administrador'], 'integer'],
            [['distancia_total', 'n_volta_total', 'ganho_elevacao', 'maior_volta', 'n_corridas', 'tempo_total'], 'number'],
            [['primeiro'], 'string', 'max' => 50],
            [['apelido'], 'string', 'max' => 255],
            [['genero'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_utilizador_utz' => 'Id Utilizador Utz',
            'primeiro' => 'Primeiro',
            'apelido' => 'Apelido',
            'telemovel' => 'Telemovel',
            'idade' => 'Idade',
            'genero' => 'Genero',
            'administrador' => 'Administrador',
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
        return $this->hasMany(Atividade::className(), ['id_utilizador_atv' => 'id_utilizador_utz']);
    }

    /**
     * Gets query for [[Comentarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComentarios()
    {
        return $this->hasMany(Comentarios::className(), ['id_utilizador_com' => 'id_utilizador_utz']);
    }

    /**
     * Gets query for [[Equipamentos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEquipamentos()
    {
        return $this->hasMany(Equipamento::className(), ['id_utilizador_ept' => 'id_utilizador_utz']);
    }

    /**
     * Gets query for [[PerfilUtilizadors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPerfilUtilizadors()
    {
        return $this->hasMany(PerfilUtilizador::className(), ['id_utilizador_per' => 'id_utilizador_utz']);
    }
}
