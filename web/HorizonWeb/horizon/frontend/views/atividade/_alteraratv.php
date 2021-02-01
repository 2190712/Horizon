<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Atividade */

$this->title = 'Update Atividade: ' . $model->id_atividade_atv;
$this->params['breadcrumbs'][] = ['label' => 'Atividades', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_atividade_atv, 'url' => ['view', 'id' => $model->id_atividade_atv]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="atividade-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>