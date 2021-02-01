<?php

use yii\helpers\Html;

?>
<!DOCTYPE html>
<html lang="en">
<title>Horizon</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet">
<style>
    body{
             background-image: url("./img/run3.jpg");
             background-repeat: no-repeat;
             background-attachment: fixed;
             background-position: center;
             height: 100%;
             min-height: 100%;
             background-size: cover;
         }


    h1 {
        color: white;
    }

    .central{
        margin: 0;
        position: absolute;
        top: 40%;
        left: 50%;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        position: fixed;
    }

    .center-screen {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        min-height: 100vh;
    }

    .letra {
        font-weight: 200;
        font-size: 100px;
        color: white;
        text-transform: uppercase;
        letter-spacing: 65px;
    }

    .button {
        display: inline-block;
        border-radius: 0px;
        background-color: transparent;
        color: white;
        text-align: center;

        letter-spacing: 8px;
        font-size: 14px;
        padding: 12px;
        width: 190px;
        transition: all 0.5s;
        cursor: pointer;
        margin: 50px;
        border: 2px solid white;
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
        color: white;


    }

    .button:hover span:after {
        opacity: 1;
        right: 0;

    }

</style>
<body>
<div>
    <div class="central">
        <div class="center-screen">
            <h1 class="letra" >
                <a style="text-decoration: none; color: white"; <?= Html::a('Horizon')?> </a>
            </h1>
            <div>
                <button class="button" style="vertical-align:middle">
                    <a <?= Html::a('<span>Login</span>', ['/site/login'])?></a>
                </button>
                <button class="button" style="vertical-align:middle">
                    <a <?= Html::a('<span>SignUp</span>', ['/site/signup'])?></a>
                </button>
            </div>
        </div>
    </div>
</div>
</body>
</html>