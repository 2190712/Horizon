<?php

use yii\helpers\Html;
use yii\web\UnauthorizedHttpException;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Atividade */

$this->title = $model->id_atividade_atv;
$this->params['breadcrumbs'][] = ['label' => 'Atividades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
if (Yii::$app->user->isGuest)
{
    throw new UnauthorizedHttpException();
}
else
{
?>
<div class="atividade-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_atividade_atv], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_atividade_atv], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_atividade_atv',
            'data_atv',
            'start_atv',
            'distancia_atv',
            'elevacao_atv',
            'velocidade_media_atv',
            'likes_atv',
            'tempo_atv',
            'id_equipamento_atv',
            'id_user_atv',
            'titulo_atv',
        ],
    ]) ?>

</div>
<?php } ?>