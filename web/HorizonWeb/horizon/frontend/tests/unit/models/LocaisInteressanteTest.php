<?php namespace frontend\tests;

use common\fixtures\UserFixture;
use frontend\models\Locaisinteressante;
class LocaisInteressanteTest extends \Codeception\Test\Unit
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
    public function testnullLocais()
    {
        $local = new Locaisinteressante();
        $local->titulo_loc = null ;
        $local->rua_loc = 'RuaFlorida';
        $local->localidade_loc = 'leiria';
        $local->coordenadas_loc = 'dfghjk';
        $local->data_loc = '2021-01-11';
        $local->pais_loc = 'Portugal';
        $local->comentario_loc = 'Bom';
        $local->save();
        $this->tester->dontSeeRecord('frontend\models\Locaisinteressante',['titulo_loc'=>'Castelo']);
    }
    public function testmorethan25charactersLocais()
    {
        $local = new Locaisinteressante();
        $local->titulo_loc = 'qwertyuioplkijuhygtfrdeswaqsdr' ;
        $local->localidade_loc = 'qwertyuioplkijuhygtfrdeswaqsdr';
        $local->pais_loc = 'qwertyuioplkijuhygtfrdeswaqsdr';
        $local->rua_loc = 'RuaFlorida';
        $local->coordenadas_loc = 'dfghjk';
        $local->data_loc = '2021-01-11';
        $local->comentario_loc = 'Bom';
        $local->save();
        $this->tester->dontSeeRecord('frontend\models\Locaisinteressante',['rua_loc'=>'RuaFlorida']);
    }
}