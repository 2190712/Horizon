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
            <h1 class="letra" >
                <a style="text-decoration: none; color: white" <?= Html::a('Horizon', ['./'])?> </a>
            </h1>
        <br>
        <div style="color: white" >
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
        <br>
            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
        <br>
            <?= $form->field($model, 'password')->passwordInput() ?>

            <!-- <div style="color:#ffffff;margin:1em 0">
                If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                <br>
                Need new verification email? <?= Html::a('Resend', ['site/resend-verification-email']) ?>
            </div>-->
            <div class="form-group">
                <?= Html::submitButton('Login', ['class' => 'button', 'name' => 'login-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
            </div>
        </div>
</div>
</body>
</html>

