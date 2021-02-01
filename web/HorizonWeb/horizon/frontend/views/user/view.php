<?php

use yii\helpers\Html;
use yii\web\UnauthorizedHttpException;
use yii\widgets\DetailView;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

if (Yii::$app->user->isGuest)
{
    throw new UnauthorizedHttpException();
}
else
{
$this->title = 'My Profile';
\yii\web\YiiAsset::register($this);
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
        padding: 10px;
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

    .button {
        display: inline-block;
        border-radius: 0px;
        background-color: transparent;
        color: #ffffff;
        text-align: center;

        letter-spacing: 8px;
        font-size: 14px;
        padding: 10px;
        width: 170px;
        transition: all 0.5s;
        cursor: pointer;
        margin: 30px;
        border: 2px solid #ffffff;
    }

    .button span {
        cursor: pointer;
        display: inline-block;
        position: relative;
        transition: 0.5s;
    }

    .button span:after {
        content: '\00bb';
        position: absolute;
        opacity: 0;
        top: 0;
        right: -20px;
        transition: 0.5s;
    }

    .button:hover span {
        padding-right: 25px;
        color: #ffffff;
    }

    .button:hover span:after {
        opacity: 1;
        right: 0;
    }

</style>
<body>
<div class="user-view">

    <h1><?= Html::encode($model->primeiro)?></h1>
    <h6>Id de Utilizador: <?=$user = Yii::$app->user->getId();?></h6>
    <br>
    <br>
    <?php
    $utz = User::findAll(['id' => $user]);
    if($utz== null)
    {
        echo'Dados Indesponiveis';
    }
    foreach ($utz as $utlz)
    {
    ?>

    <table style="width:100%">
        <tr>
            <th>First Name</th>
            <td><?= $primeiro= $utlz->primeiro; ?></td>
        </tr>
        <tr>
            <th>Last Name</th>
            <td><?= $apelido= $utlz->apelido; ?></td>
        </tr>
        <tr>
            <th>Mobile number</th>
            <td><?= $telemovel= $utlz->telemovel; ?></td>
        </tr>
        <tr>
            <th>Age</th>
            <td><?= $idade= $utlz->idade; ?></td>
        </tr>
        <tr>
            <th>Genre</th>
            <td><?= $genero= $utlz->genero; ?></td>
        </tr>
        <tr>
            <th>Username</th>
            <td><?= $username= $utlz->username; ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?= $email= $utlz->email; ?></td>
        </tr>
        <tr>
            <th>Total Distance</th>
            <td><?= $distancia_total= $utlz->distancia_total; ?></td>
        </tr>
        <tr>
            <th>Nº of laps</th>
            <td><?= $n_volta_total= $utlz->n_volta_total; ?></td>
        </tr>
        <tr>
            <th>Elevation</th>
            <td><?= $ganho_elevacao= $utlz->ganho_elevacao; ?></td>
        </tr>
        <tr>
            <th>Biggest lap</th>
            <td><?= $maior_volta= $utlz->maior_volta; ?></td>
        </tr>
        <tr>
            <th>Nº of Racing</th>
            <td><?= $n_corridas= $utlz->n_corridas; ?></td>
        </tr>
        <tr>
            <th>Total time</th>
            <td><?= $tempo_total= $utlz->tempo_total; ?></td>
        </tr>

        <?php
        }
        ?>

    </table>
    <br>
    <br>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'button']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'button',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php
    }
    ?>
</div>
</body>
</html>