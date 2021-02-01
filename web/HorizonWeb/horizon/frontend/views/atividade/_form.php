<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Atividade */
/* @var $form yii\widgets\ActiveForm */
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
        text-decoration: none;
    }

    .container1 {
        position: center;
    }

    input[type=text] {
        background-color:transparent;
        font-size: 14px;
        width: 100%;
        padding: 4px 20px;
        margin: 6px 0;
        box-sizing: border-box;
        border: none;
        color: #ffffff;
        border-bottom: 2px solid #ffffff;
    }

    .button {
        display: inline-block;
        border-radius: 0px;
        background-color: transparent;
        color: #ffffff;
        text-align: center;

        letter-spacing: 8px;
        font-size: 14px;
        padding: 8px;
        width: 130px;
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

<br>
<br>
<div class="atividade-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'titulo_atv')->textInput(['maxlength' => true])->label('Activity Title')  ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'button']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

</div>
</div>
</body>
</html>