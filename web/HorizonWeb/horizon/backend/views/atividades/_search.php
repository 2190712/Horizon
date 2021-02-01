<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\AtividadeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="atividade-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_atividade_atv') ?>

    <?= $form->field($model, 'data_atv') ?>

    <?= $form->field($model, 'start_atv') ?>

    <?= $form->field($model, 'distancia_atv') ?>

    <?= $form->field($model, 'elevacao_atv') ?>

    <?php // echo $form->field($model, 'velocidade_media_atv') ?>

    <?php // echo $form->field($model, 'likes_atv') ?>

    <?php // echo $form->field($model, 'tempo_atv') ?>

    <?php // echo $form->field($model, 'id_equipamento_atv') ?>

    <?php // echo $form->field($model, 'id_user_atv') ?>

    <?php // echo $form->field($model, 'titulo_atv') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
