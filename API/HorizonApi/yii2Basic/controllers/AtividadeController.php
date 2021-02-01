<?php

namespace app\controllers;

use app\models\Atividade;
use app\models\Utilizadores;
use yii\rest\ActiveController;
use yii\web\NotFoundHttpException;

class AtividadeController extends ActiveController
{
    public $modelClass = 'app\models\Atividade';

    public function  actionAdicionar()
    {

        //$id_atividade_atv=\Yii::$app->request->post('id_atividade_atv'); // \Yii means use Yii
        $data_atv=\Yii::$app->request->post('data_atv');
        $start_atv=\Yii::$app->request->post('start_atv');;
        $distancia_atv=\Yii::$app->request->post('distancia_atv');;
        $elevacao_atv=\Yii::$app->request->post('elevacao_atv');;
        $velocidade_media_atv=\Yii::$app->request->post('velocidade_media_atv');;
        $likes_atv=\Yii::$app->request->post('likes_atv');;
        $tempo_atv=\Yii::$app->request->post('tempo_atv');;
        $id_equipamento_atv=\Yii::$app->request->post('id_equipamento_atv');;
        $id_user_atv=\Yii::$app->request->post('id_user_atv');;
        $titulo_atv=\Yii::$app->request->post('titulo_atv');;

        $climodel = new Atividade();
        //$climodel->id_atividade_atv=$id_atividade_atv;
        $climodel->data_atv=$data_atv;
        $climodel->start_atv=$start_atv;
        $climodel->distancia_atv=$distancia_atv;
        $climodel->elevacao_atv=$elevacao_atv;
        $climodel->velocidade_media_atv=$velocidade_media_atv;
        $climodel->likes_atv=$likes_atv;
        $climodel->tempo_atv=$tempo_atv;
        $climodel->id_equipamento_atv=$id_equipamento_atv;
        $climodel->id_user_atv=$id_user_atv;
        $climodel->titulo_atv=$titulo_atv;


        $ret = $climodel->save(); return ['SaveError' => $ret];

    }

    public function actionEliminar()
    {

        $tempoAtv = Atividade::find()
            ->select(['*'])
            ->from('atividade')
            ->all();

        Atividade::deleteAll('tempo_atv <= "00:05:00"');
        return $tempoAtv;
    }

    public function actionApagar()
    {

        $tempoAtv = Atividade::find()
            ->select(['*'])
            ->from('atividade')
            ->all();

        Atividade::deleteAll('id_atividade_atv= "10"');
        return $tempoAtv;
    }
    // Atualizar os dados do id de atividade selecionada
    public function actionAtualizar($id)
    {
        $titulo_atv=\Yii::$app->request->post('titulo_atv');;

        $climodel = new Atividade();
        $rec = $climodel::find()->where('id_atividade_atv ='.$id)->one();

        //if(count($rec) > 0) {

        $rec->titulo_atv=$titulo_atv;
        $rec->save(); return ['SaveError' => 'Ok'];
        //}
        // throwException('Client id not found!');
    }
}
