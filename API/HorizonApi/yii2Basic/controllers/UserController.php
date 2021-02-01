<?php

namespace app\controllers;

use app\models\User;
use yii\rest\ActiveController;

class UserController extends ActiveController
{
    public $modelClass = 'app\models\User';

    public function  actionAdicionar()
    {
        $username=\Yii::$app->request->post('username');
       // $auth_key=\Yii::$app->request->post('auth_key');
        //$password_hash=\Yii::$app->request->post('password_hash');
        $password_reset_token=\Yii::$app->request->post('password_reset_token');
        $password=\Yii::$app->request->post('password');
        $email=\Yii::$app->request->post('email');
        //$verification_token=\Yii::$app->request->post('verification_token');
        $primeiro=\Yii::$app->request->post('primeiro'); // \Yii means use Yii
        $apelido=\Yii::$app->request->post('apelido');
        $telemovel=\Yii::$app->request->post('telemovel');;
        $idade=\Yii::$app->request->post('idade');;
        $genero=\Yii::$app->request->post('genero');;
        $distancia_total=\Yii::$app->request->post('distancia_total');;
        $n_voltas_total=\Yii::$app->request->post('n_volta_total');;
        $ganho_elevacao=\Yii::$app->request->post('ganho_elevacao');;
        $maior_volta=\Yii::$app->request->post('maior_volta');;
        $n_corridas=\Yii::$app->request->post('n_corridas');;
        $tempo_total=\Yii::$app->request->post('tempo_total');;

        $climodel = new User();

        $climodel->username=$username;
        $climodel->generateAuthKey();
        $climodel->setPassword($password);
        $climodel->generateEmailVerificationToken();
       // $climodel->auth_key=$auth_key;
       // $climodel->password_hash=$password_hash;
        $climodel->password_reset_token=$password_reset_token;
        $climodel->email=$email;
        //$climodel->status=$status;
       // $climodel->role=$role;
        //$climodel->created_at=$created_at;
        //$climodel->updated_at=$updated_at;
        //$climodel->verification_token=$verification_token;

        $climodel->primeiro=$primeiro;
        $climodel->apelido=$apelido;
        $climodel->telemovel=$telemovel;
        $climodel->idade=$idade;
        $climodel->genero=$genero;
        $climodel->distancia_total=$distancia_total;
        $climodel->n_volta_total=$n_voltas_total;
        $climodel->ganho_elevacao=$ganho_elevacao;
        $climodel->maior_volta=$maior_volta;
        $climodel->n_corridas=$n_corridas;
        $climodel->tempo_total=$tempo_total;

        $ret = $climodel->save(); return ['SaveError' => $ret];

    }

    //http://localhost:8888/User/total
    public function actionTotal()
    {
        $utzmodel = new $this->modelClass;
        $recs = $utzmodel::find()->all();
        return ['total' => count($recs)];
    }

    //http://localhost:8888/User/generos
    public function actionGeneros()
    {

        //Procura o numero de User do sexo masculino
        $generoMasc = User::find()
            ->select(['COUNT(*)'])
            ->from('user')
            ->where(['genero' => 'masculino'])
            ->count();

        //Procura o numero de User do sexo feminino
        $generoFem = User::find()
            ->select(['COUNT(*)'])
            ->from('user')
            ->where(['genero' => 'feminino'])
            ->count();

        $final = 'Existe '. $generoMasc. ' User do sexo masculino e '. $generoFem. ' do sexo feminino';

        return $final;
    }

    //http://localhost:8888/User/idade
    public function actionIdade()
    {

        $menorIdade = User::find()
            ->select(['COUNT(*)'])
            ->from('user')
            ->where(['<', 'idade', '18'])
            ->count();


        $maiorIdade = User::find()
            ->select(['COUNT(*)'])
            ->from('user')
            ->where(['>', 'idade', '18'])
            ->count();

        $final = 'Existe '. $menorIdade. ' User de menor de idade e '. $maiorIdade. ' User de maior de idade';

        return $final;
    }


}
