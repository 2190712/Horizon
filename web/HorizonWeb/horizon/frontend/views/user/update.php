<?php

use yii\helpers\Html;
use yii\web\UnauthorizedHttpException;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = 'Update User: ' . $model->id;

?>
<div class="user-update">

    <h1><?php
        if (Yii::$app->user->isGuest)
        {
            throw new UnauthorizedHttpException();
        }
        else
        {

        Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
<?php }?>