<?php
namespace backend\tests;


use frontend\tests\AcceptanceTester;
use frontend\tests\FunctionalTester;
use common\fixtures\UserFixture;

class UpdateUserTest extends \Codeception\Test\Unit
{
    /**
     * @var \backend\tests\FunctionalTester
     */
    protected $tester;
    public function _fixtures()
    {
        return [
            'user' => [
                'class' => UserFixture::className(),
                'dataFile' => codecept_data_dir() . 'login_data.php',
            ],
        ];
    }
    public function _before(FunctionalTester $I)
    {

    }
}