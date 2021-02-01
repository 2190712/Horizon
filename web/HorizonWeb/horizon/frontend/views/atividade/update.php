<?php

use yii\helpers\Html;
use yii\web\UnauthorizedHttpException;

/* @var $this yii\web\View */
/* @var $model common\models\Atividade */

$this->title = 'Update Activity Title ';
if (Yii::$app->user->isGuest)
{
    throw new UnauthorizedHttpException();
}
else
{
?>
<div class="atividade-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
<?php }?>