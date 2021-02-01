<?php namespace frontend\tests;

use common\fixtures\UserFixture;
use common\models\Atividade;
use common\models\Equipamento;

class EquipamentoTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
        { $this->tester->haveFixtures([
            'user' => [
                'class' => UserFixture::className(),
                'dataFile' => codecept_data_dir() . 'user.php'
            ]
        ]);
        }
    }

    protected function _after()
    {
    }

    // tests
    public function testInsereEquipamento()
    {
        $equipamento = new Equipamento();
        $equipamento->titulo_ept = 'Scott';
        $equipamento->kilometros_ept= '5600';
        $equipamento->id_user_ept = '1';
        $equipamento->save();
        $this->tester->seeRecord('common\models\Equipamento', ['titulo_ept'=>'Scott']);
    }
}