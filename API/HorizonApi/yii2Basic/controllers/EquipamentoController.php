<?php

namespace app\controllers;

use app\models\Equipamento;
use yii\rest\ActiveController;

class EquipamentoController extends ActiveController
{
    public $modelClass = 'app\models\Equipamento';


    //http://localhost:8888/equipamento/total
    public function actionTotal()
    {
        $eqpmodel = new $this->modelClass;
        $recs = $eqpmodel::find()->all();
        return ['total' => count($recs)];
    }

    //http://localhost:8888/equipamento/titulo
    public function actionTitulo()
    {
        $titulo= Equipamento::find()
            ->select(['titulo_ept'])
            ->from('equipamento')
            ->all();

        return $titulo;
    }
}
