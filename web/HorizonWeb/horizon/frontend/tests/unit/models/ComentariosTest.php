<?php namespace frontend\tests;

use common\fixtures\UserFixture;
use common\models\Comentarios;

class ComentariosTest extends \Codeception\Test\Unit
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
    public function testInserecomentario()
    {
            $comentario = new Comentarios();
            $comentario->data_com = '2021-01-11';
            $comentario->hora_com = '16:15:23';
            $comentario->comentario_com = 'Brutal';
            $comentario->id_user_com = '1';
            $comentario->id_atividade_com = '9';

        $comentario->save();

        $this->tester->seeRecord('common\models\comentarios', ['comentario_com'=>'Brutal']);
    }
}