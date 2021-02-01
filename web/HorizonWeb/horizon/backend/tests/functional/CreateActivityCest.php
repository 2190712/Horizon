<?php
namespace backend\tests\functional;
use backend\tests\FunctionalTester;
use common\fixtures\UserFixture;

class CreateActivityCest
{/**
 * Load fixtures before db transaction begin
 * Called in _before()
 * @see \Codeception\Module\Yii2::_before()
 * @see \Codeception\Module\Yii2::loadFixtures()
 * @return array
 */
    public function _before(FunctionalTester $I)
    {
       // $I->amOnRoute('/atividades/index');
    }
    public function _fixtures()
    {
        return [
            'user' => [
                'class' => UserFixture::className(),
                'dataFile' => codecept_data_dir() . 'login_data.php',
            ],
        ];
    }
    public function checkEmpty(FunctionalTester $I)
    {
        $I->amOnPage('/site/login');
        $I->fillField('Username', 'erau');
        $I->fillField('Password', 'password_0');
        $I->click('Login');
        $I->amOnPage('/atividades/index');
        $I->click('Create Activity');
        $I->click('save-button');
        $I->seeValidationError('Inicio_atividade cannot be blank');
        $I->seeValidationError('Distancia cannot be blank.');
        $I->seeValidationError('Elevacao cannot be blank.');
        $I->seeValidationError('Velocidade_Media cannot be blank.');
        $I->seeValidationError('Tempo cannot be blank.');
        $I->seeValidationError('Id_User cannot be blank');
        $I->seeValidationError('Titulo cannot be blank.');
    }

    /**
     * @param FunctionalTester $I
     */
    public function createatividade(FunctionalTester $I)
    {
        $I->amOnPage('/site/login');
        $I->fillField('Username', 'erau');
        $I->fillField('Password', 'password_0');
        $I->click('Login');
       // $I->see('Activity');
        $I->amOnPage('/atividades/index');
        $I->click('Create Activity');
        $I->fillField('Data', '2021-01-07');
        $I->fillField('Inicio_atividade', '11:00:37');
        $I->fillField('Distancia', '65');
        $I->fillField('Elevacao', '1500');
        $I->fillField('Velocidade_Media', '16');
        $I->fillField('Likes', '6');
        $I->fillField('Tempo', '03:04:00');
        $I->fillField('Id_Equipamento', '1');
        $I->fillField('Id_User', '1');
        $I->fillField('Titulo', 'Volta Noturna');
        $I->click('save-button');
        $I->see('Volta Noturna');
    }
}
