<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\UnauthorizedHttpException;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

if (Yii::$app->user->isGuest)
{
    throw new UnauthorizedHttpException();
}
else
{

$this->title = 'Users';

?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php  //echo $this->render('_search', ['model' => $searchModel]); ?>
    <br>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            //'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            //'email:email',

            //'role',
            //'created_at',
            //'updated_at',
            //'verification_token',
            'primeiro',
            'apelido',
            'telemovel',
            'idade',
            'genero',
            //'status',
            [
                'header' => 'Status',
                'value' => function ($model) {
                    if($model->status == 10)
                    {
                        return 'Ativo';
                    }else
                    {
                        return 'Bloqueado';
                    }
                },
            ],
            [
                'header' => 'Admin',
                'value' => function ($model) {
                    if($model->role == 10)
                    {
                        return 'Normal';
                    }else
                    {
                        return 'Administrador';
                    }
                },
            ],
            //'distancia_total',
            //'n_volta_total',
            //'ganho_elevacao',
            //'maior_volta',
            //'n_corridas',
            //'tempo_total',


            ['class' => 'yii\grid\ActionColumn',
                'header'=>'Action',
                'template'=>'{view} {update} {delete} {Admin} {banir}',
                //'headerOptions'=>['width' =>'80'],
                'buttons'=>[

                    'Admin' => function ($url, $model, $key)
                    {
                        return Html::a('<span class="glyphicon glyphicon-user"></span>', ['/user/admin', 'id' => $model->id]);
                    },
                    'banir' => function ($url, $model, $key)
                    {
                        return Html::a('<span class="glyphicon glyphicon-remove-circle"></span>', ['/user/ban', 'id' => $model->id]


                        );
                    },

                ],


            ],
    ]]);
}
?>


</div>
