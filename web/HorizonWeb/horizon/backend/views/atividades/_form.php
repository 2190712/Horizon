<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Atividade */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="atividade-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'data_atv')->textInput() ?>

    <?= $form->field($model, 'start_atv')->textInput() ?>

    <?= $form->field($model, 'distancia_atv')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'elevacao_atv')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'velocidade_media_atv')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'likes_atv')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tempo_atv')->textInput() ?>

    <?= $form->field($model, 'id_equipamento_atv')->textInput() ?>

    <?= $form->field($model, 'id_user_atv')->textInput() ?>

    <?= $form->field($model, 'titulo_atv')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success', 'name' => 'save-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
