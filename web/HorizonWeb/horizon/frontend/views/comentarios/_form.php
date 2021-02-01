<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\comentarios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comentarios-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'data_com')->textInput() ?>

    <?= $form->field($model, 'hora_com')->textInput() ?>

    <?= $form->field($model, 'comentario_com')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'id_user_com')->textInput() ?>

    <?= $form->field($model, 'id_atividade_com')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
