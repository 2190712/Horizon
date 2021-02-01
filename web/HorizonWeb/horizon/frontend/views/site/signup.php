<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

<html>
<title>Horizon</title>

<style>
    body{
        background-image: url("../img/run4.jpg");
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
        height: 100%;
        min-height: 100%;
        background-size: cover;
    }

    h1 {

        color: #ffffff;
    }

    .central{
        margin: 0;
        position: center;
    }


    .letra {
             font-weight: 200;
             font-size: 90px;
             color: #ffffff;
             text-transform: uppercase;
             letter-spacing: 65px;
         }

    .button {
        display: inline-block;
        border-radius: 0px;
        background-color: transparent;
        color: #ffffff;
        text-align: center;
        letter-spacing: 8px;
        font-size: 14px;
        padding: 12px;
        width: 190px;
        transition: all 0.5s;
        cursor: pointer;
        margin: 50px;
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

    input[type=password] {
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

</style>
<body>
<div>
    <div class="central">
        <br>
        <div class="fixed">
        <h1 class="letra" >
            <a style="text-decoration: none; color: #ffffff" <?= Html::a('Horizon', ['./'])?> </a>
        </h1>
        <br>
        <div style=" color: #ffffff" >

            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            <div class="row">
                <div class="col-sm-6">
                    <?= $form->field($model, 'primeiro_nome')->label('First Name') ?>
                    <br>
                </div>
                <div class="col-sm-6" style="">
                    <?= $form->field($model, 'ultimo_nome')->label('Last Name') ?>
                    <br>
                </div>
            </div>
            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
            <br>
            <div class="row">
                <div class="col-lg-5">
                    <div class="row">
                        <div class="col-sm-10">

                            <?= $form->field($model, 'genero')->dropDownList([ 'masculino' => 'Male', 'feminino' => 'Female', ], ['prompt' => ' '])->label('Genre')  ?>
                            <br>
                        </div>
                        <div class="col-sm-10">

                            <?= $form->field($model, 'idade')->label('Age') ?>
                            <br>

                        </div>
                    </div>
                </div>
            </div>

            <?= $form->field($model, 'email') ?>
            <br>

            <?= $form->field($model, 'password')->passwordInput() ?>
            <br>

            <?= $form->field($model, 'telemovel')->textInput()->label('Mobile number') ?>
            <br>

            <div class="form-group">
                <?= Html::submitButton('Signup', ['class' => 'button', 'name' => 'signup-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
    </div>
</div>
</body>
</html>
