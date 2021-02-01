<?php

namespace app\modules\api\controllers;

use yii\web\Controller;

/**
 * Default controller for the `api` module
 */
class UserController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public $modelClass = 'app\models\User';

    public function actionIndex()
    {
        return $this->render('index');
    }
}
