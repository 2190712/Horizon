<?php namespace frontend\tests;

use common\fixtures\UserFixture;
use common\models\Atividade;
use common\models\User;

class AtividadesTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;


    protected function _before()
    { $this->tester->haveFixtures([
        'user' => [
            'class' => UserFixture::className(),
            'dataFile' => codecept_data_dir() . 'user.php'
        ]
    ]);
    }

    protected function _after()
    {
    }

    // tests
    public function testInsereAtividade()
    {
        $atividade = new Atividade();
        $atividade->data_atv = '2021-01-11';
        $atividade->start_atv = '08:05:56';
        $atividade->distancia_atv = '56';
        $atividade->elevacao_atv='650';
        $atividade->velocidade_media_atv ='20';
        $atividade->likes_atv = '20';
        $atividade->tempo_atv= '03:25:51';
        $atividade->id_equipamento_atv= '1';
        $atividade->id_user_atv='1';
        $atividade->titulo_atv='volta de natal';
        $atividade->save();
        $this->tester->seeRecord('common\models\atividade', ['titulo_atv'=>'volta de natal']);
    }
}