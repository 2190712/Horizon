<?php

use yii\helpers\Html;
use yii\web\UnauthorizedHttpException;

/* @var $this yii\web\View */
/* @var $model common\models\Atividade */
if (Yii::$app->user->isGuest)
{
    throw new UnauthorizedHttpException();
}
else
{
$this->title = 'Create Atividade';
$this->params['breadcrumbs'][] = ['label' => 'Atividades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="atividade-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
<?php } ?>