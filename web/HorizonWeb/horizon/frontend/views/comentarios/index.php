<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ComentariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comentarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comentarios-index">

    <h1><?= Html::encode($this->title) ?></h1>
   <?php




   $comentarios = \common\models\Comentarios::findAll(['id_comentario_com' => $model->id_comentario_com]);

   if($comentarios== null)
   {
       echo'Sem Atividades';
   }
   foreach ($comentarios as $comentario)
   {
   ?>
    <td><?= $titulo= $comentario->comentario_com; ?></td>
    <td><?= $start= $comentario->data_com; ?></td>
    <td><?= $duracao= $comentario->hora_com; ?></td>
    <td><?= $distancia= $comentario->comentario_com; ?></td>
    <td><?= $velocidade= $comentario->id_atividade_com; ?></td>
    <td><?= $elevacao= $comentario->id_user_com; ?></td>






    <p>
        <?= Html::a('Create Comentario', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


</div>
<?php } ?>