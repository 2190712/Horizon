<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\User;
use common\models\atividade;
/* @var $this yii\web\View */
/* @var $searchModel app\models\AtividadeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Atividades';
?>
<html>
<style>
    html,
    body {
        height: 100%;
    }

    body {
        margin: 0;
        background-image: url("../img/run4.jpg");
        font-family: sans-serif;
        font-weight: 100;
        color: white;
    }

    .container1 {
        position: center;
    }

    table {
        width: 800px;
        border-collapse: collapse;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0,0,0,0.1);
    }

    th,
    td {
        padding: 15px;
        background-color: rgba(255,255,255,0.2);
        color: #fff;
    }

    th {
        text-align: left;
    }

    tbody {
    tr {
    &:hover {
         background-color: rgba(255,255,255,0.3);
     }
    }
    td {
        position: relative;
    &:hover {
    &:before {
         content: "";
         position: absolute;
         left: 0;
         right: 0;
         top: -9999px;
         bottom: -9999px;
         background-color: rgba(255,255,255,0.2);
         z-index: -1;
     }
    }
    }
    }
</style>
<body>
<div class="container1">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php
    $user = Yii::$app->user->getId();?>
    <br>
    <table style="width:100%">
        <tr>
            <th>Titulo de Atividade</th>
            <th>Inicio da Atividade</th>
            <th>Duração</th>
            <th>Distância da Atividade (Km)</th>
            <th>Velocidade média (Km/h)</th>
            <th>Elevação</th>
            <th>Editar titulo da Atividade</th>
            <th>Eliminar</th>
        <tr>
            <?php
            $atividades = Atividade::findAll(['id_user_atv' => $user]);
            if($atividades== null)
            {
                echo'Sem Atividades';
            }
            foreach ($atividades as $atividade)
            {
            ?>
            <td><?= $titulo= $atividade->titulo_atv; ?></td>
            <td><?= $start= $atividade->start_atv; ?></td>
            <td><?= $duracao= $atividade->tempo_atv; ?></td>
            <td><?= $distancia= $atividade->distancia_atv; ?></td>
            <td><?= $velocidade= $atividade->velocidade_media_atv; ?></td>
            <td><?= $elevacao= $atividade->elevacao_atv; ?></td>
            <td><?= Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update_linha', 'id' => $atividade->id_atividade_atv]) ?></td>

            <td><?= Html::a('<span class="glyphicon glyphicon-remove"></span>', ['delete', 'id' => $atividade->id_atividade_atv], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?></td>
        </tr>

        <?php
        }
        ?>

    </table>
</div>
</body>
</html>