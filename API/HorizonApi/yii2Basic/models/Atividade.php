<?php

namespace app\models;

use app\models\Comentarios;
use app\models\Foto;
use app\models\Locaisinteressante;
use app\models\User;
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
            'data_atv' => 'Data Atv',
            'start_atv' => 'Start Atv',
            'distancia_atv' => 'Distancia Atv',
            'elevacao_atv' => 'Elevacao Atv',
            'velocidade_media_atv' => 'Velocidade Media Atv',
            'likes_atv' => 'Likes Atv',
            'tempo_atv' => 'Tempo Atv',
            'id_equipamento_atv' => 'Id Equipamento Atv',
            'id_user_atv' => 'Id Utilizador Atv',
            'titulo_atv' => 'Titulo Atv',
        ];
    }

    /**
     * Gets query for [[UtilizadorAtv]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUtilizadorAtv()
    {
        return $this->hasOne(Utilizadores::className(), ['id_utilizador_utz' => 'id_user_atv']);
    }

    /**
     * Gets query for [[EquipamentoAtv]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEquipamentoAtv()
    {
        return $this->hasOne(Equipamento::className(), ['id_equipamento_ept' => 'id_equipamento_atv']);
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

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        //Obter dados do registo em causa
        $id_atividade_atv=$this->id_atividade_atv;
        $data_atv=$this->data_atv;
        $start_atv=$this->start_atv;
        $distancia_atv=$this->distancia_atv;
        $elevacao_atv=$this->elevacao_atv;
        $velocidade_media_atv=$this->velocidade_media_atv;
        $likes_atv=$this->likes_atv;
        $tempo_atv=$this->tempo_atv;
        $id_equipamento_atv=$this->id_equipamento_atv;
        $id_user_atv=$this->id_user_atv;
        $titulo_atv=$this->titulo_atv;

        $myObj = new \stdClass();
        $myObj->id_atividade_atv=$id_atividade_atv;
        $myObj->data_atv=$data_atv;
        $myObj->start_atv=$start_atv;
        $myObj->distancia_atv=$distancia_atv;
        $myObj->elevacao_atv=$elevacao_atv;
        $myObj->velocidade_media_atv=$velocidade_media_atv;
        $myObj->likes_atv=$likes_atv;
        $myObj->tempo_atv=$tempo_atv;
        $myObj->id_equipamento_atv=$id_equipamento_atv;
        $myObj->id_user_atv=$id_user_atv;
        $myObj->titulo_atv=$titulo_atv;
        $myJSON = json_encode($myObj);
        if($insert)
            $this->FazPublish("INSERT",$myJSON);
        else
            $this->FazPublish("UPDATE",$myJSON);


    }
    public function afterDelete()
    {
        parent::afterDelete();
        $prod_id= $this->id_atividade_atv;
        $myObj=new Atividade();
        $myObj->id_atividade_atv = $prod_id;
        $myJSON = json_encode($myObj);
        $this->FazPublish("DELETE",$myJSON);
    }
    public function FazPublish($canal,$msg)
    {
        $server = "127.0.0.1";
        $port = 1883;
        $username = ""; // set your username
        $password = ""; // set your password
        $client_id = "phpMQTT-publisher"; // unique!
        $mqtt = new \app\mosquitto\phpMQTT($server, $port, $client_id);
        if ($mqtt->connect(true, NULL, $username, $password))
        {
            $mqtt->publish($canal, $msg, 0);
            $mqtt->close();
        }
        else
        {
            file_put_contents("debug.output","Time out!");
        }
    }
}
