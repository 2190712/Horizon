<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'primeiro')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apelido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telemovel')->textInput() ?>

    <?= $form->field($model, 'idade')->textInput() ?>

    <?= $form->field($model, 'genero')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'distancia_total')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'n_volta_total')->textInput() ?>

    <?= $form->field($model, 'ganho_elevacao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'maior_volta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'n_corridas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tempo_total')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
