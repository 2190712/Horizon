<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\comentarios */

$this->title = 'Update Comentarios: ' . $model->id_comentario_com;
$this->params['breadcrumbs'][] = ['label' => 'Comentarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_comentario_com, 'url' => ['view', 'id' => $model->id_comentario_com]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="comentarios-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
