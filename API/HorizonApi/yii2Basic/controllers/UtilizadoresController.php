<?php

namespace app\controllers;

use app\models\Utilizadores;
use yii\rest\ActiveController;

class UtilizadoresController extends ActiveController
{
    public $modelClass = 'app\models\Utilizadores';

    public function  actionAdicionar()
    {


        $primeiro=\Yii::$app->request->post('primeiro'); // \Yii means use Yii
        $apelido=\Yii::$app->request->post('apelido');
        $telemovel=\Yii::$app->request->post('telemovel');;
        $idade=\Yii::$app->request->post('idade');;
        $genero=\Yii::$app->request->post('genero');;
        $administrador=\Yii::$app->request->post('administrador');;
        $distancia_total=\Yii::$app->request->post('distancia_total');;
        $n_voltas_total=\Yii::$app->request->post('n_voltas_total');;
        $ganho_elevacao=\Yii::$app->request->post('ganho_elevacao');;
        $maior_volta=\Yii::$app->request->post('maior_volta');;
        $n_corridas=\Yii::$app->request->post('n_corridas');;
        $tempo_total=\Yii::$app->request->post('tempo_total');;

        $climodel = new Utilizadores();
        $climodel->primeiro=$primeiro;
        $climodel->apelido=$apelido;
        $climodel->telemovel=$telemovel;
        $climodel->idade=$idade;
        $climodel->genero=$genero;
        $climodel->administrador=$administrador;
        $climodel->distancia_total=$distancia_total;
        $climodel->n_volta_total=$n_voltas_total;
        $climodel->ganho_elevacao=$ganho_elevacao;
        $climodel->maior_volta=$maior_volta;
        $climodel->n_corridas=$n_corridas;
        $climodel->tempo_total=$tempo_total;

        $ret = $climodel->save(); return ['SaveError' => $ret];

    }

    //http://localhost:8888/utilizadores/total
    public function actionTotal()
    {
        $utzmodel = new $this->modelClass;
        $recs = $utzmodel::find()->all();
        return ['total' => count($recs)];
    }

    //http://localhost:8888/utilizadores/generos
    public function actionGeneros()
    {

    //Procura o numero de utilizadores do sexo masculino
        $generoMasc = Utilizadores::find()
            ->select(['COUNT(*)'])
            ->from('utilizadores')
            ->where(['genero' => 'masculino'])
            ->count();

    //Procura o numero de utilizadores do sexo feminino
        $generoFem = Utilizadores::find()
            ->select(['COUNT(*)'])
            ->from('utilizadores')
            ->where(['genero' => 'feminino'])
            ->count();

        $final = 'Existe '. $generoMasc. ' utilizadores do sexo masculino e '. $generoFem. ' do sexo feminino';

        return $final;
    }

    //http://localhost:8888/utilizadores/idade
    public function actionIdade()
    {

        $menorIdade = Utilizadores::find()
            ->select(['COUNT(*)'])
            ->from('utilizadores')
            ->where(['<', 'idade', '18'])
            ->count();


        $maiorIdade = Utilizadores::find()
            ->select(['COUNT(*)'])
            ->from('utilizadores')
            ->where(['>', 'idade', '18'])
            ->count();

        $final = 'Existe '. $menorIdade. ' utilizadores de menor de idade e '. $maiorIdade. ' utilizadores de maior de idade';

        return $final;
    }


}
