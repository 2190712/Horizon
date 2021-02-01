<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\UnauthorizedHttpException;
/* @var $this yii\web\View */
/* @var $searchModel common\models\AtividadeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


if (Yii::$app->user->isGuest)
{
    throw new UnauthorizedHttpException();
}
else
{

$this->title = 'Activity';

?>
<div class="atividade-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <br>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_atividade_atv',
            'data_atv',
            'start_atv',
            'distancia_atv',
            'elevacao_atv',
            //'velocidade_media_atv',
            //'likes_atv',
            //'tempo_atv',
            //'id_equipamento_atv',
            //'id_user_atv',
            //'titulo_atv',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <br>
    <p>
        <?= Html::a('Create Activity', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

<?php } ?>
</div>
