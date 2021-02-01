<?php

use common\models\Comentarios;
use yii\helpers\Html;
use yii\grid\GridView;

use common\models\atividade;
use yii\web\UnauthorizedHttpException;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AtividadeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Feed';
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
    <h1><?php
        if (Yii::$app->user->isGuest)
        {
            throw new UnauthorizedHttpException();
        }
        else
        {


        Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php
    ?>
    <br>
    <table style="width:100%">
        <tr>
            <th>User</th>
            <th>Activity Title</th>
            <th>Activity Start</th>
            <th>Duration</th>
            <th>Activity Distance (Km)</th>
            <th>Average speed (Km / h)</th>
            <th>Elevation</th>


        <tr>
            <?php

            $atividades=Atividade::find()->all();
            if($atividades== null)
            {
                echo'Sem Atividades';
            }
            foreach ($atividades as $atividade)
            {
            ?>
            <td><?= $utilizador= $atividade->userAtv->username; ?></td>
            <td><?= $titulo= $atividade->titulo_atv; ?></td>
            <td><?= $start= $atividade->start_atv; ?></td>
            <td><?= $duracao= $atividade->tempo_atv; ?></td>
            <td><?= $distancia= $atividade->distancia_atv; ?></td>
            <td><?= $velocidade= $atividade->velocidade_media_atv; ?></td>
            <td><?= $elevacao= $atividade->elevacao_atv; ?></td>
            <?php $comentario = Comentarios::findOne(['id_atividade_com' => $atividade->id_atividade_atv])?>

        </tr>

        <?php
        }
        ?>

    </table>
</div>
</body>
</html>
<?php } ?>