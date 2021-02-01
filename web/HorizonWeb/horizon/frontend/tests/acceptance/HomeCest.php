<?php
namespace frontend\tests\acceptance;

use common\fixtures\UserFixture;
use frontend\tests\AcceptanceTester;
use yii\helpers\Url;


class HomeCest
{/**
 * Load fixtures before db transaction begin
 * Called in _before()
 * @see \Codeception\Module\Yii2::_before()
 * @see \Codeception\Module\Yii2::loadFixtures()
 * @return array
 */
    public function _fixtures()
    {
        return [
            'user' => [
                'class' => UserFixture::className(),
                'dataFile' => codecept_data_dir() . 'login_data.php',
            ],
        ];
    }

    public function checkHome(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/index'));
        $I->see('Horizon');

        $I->seeLink('Login');
        $I->click('Login');
        $I->wait(2); // wait for page to be opened

        $I->see('Horizon');
    }
    public function checkLogin(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/login'));
        $I->see('Horizon');

        $I->fillField('Username', 'erau');
        $I->fillField('Password', 'password_0');
        $I->click('login-button');

        $I->dontSeeLink('Login');
        $I->dontSeeLink('Signup');
       // $I->dontSeeLink('Login');
       // $I->dontSeeLink('Signup');
        //$I->see('Horizon');

    }
}
