<?php
namespace frontend\tests\unit\models;

use common\fixtures\UserFixture;
use frontend\models\SignupForm;

class SignupFormTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;


    public function _before()
    {
        $this->tester->haveFixtures([
            'user' => [
                'class' => UserFixture::className(),
                'dataFile' => codecept_data_dir() . 'user.php'
            ]
        ]);
    }

    public function testCorrectSignup()
    {
        $model = new SignupForm([
            'username' => 'some_username',
            'email' => 'some_email@example.com',
            'password' => 'some_password',
            'telemovel'=>'956325562',
            'primeiro_nome'=>'Firstname',
            'ultimo_nome'=>'lastname',
            'genero'=>'masculino',
            'idade'=>'62',
        ]);

       // $user = $model->signup();

       // expect($user)->true();

        /** @var \common\models\User $user */
        $user = $this->tester->grabRecord('common\models\User', [
            'username' => 'test.test',
            'email' => 'Test1234',

        ]);


    }

    public function testNotCorrectSignup()
    {
        $model = new SignupForm([
            'username' => 'troy.becker',
            'email' => 'nicolas.dianna@hotmail.com',
            'password' => 'some_password',
            'telemovel'=>'92566626',
            'primeiro_nome'=>'s',
            'ultimo_nome'=>'d',
            'genero'=>'',
            'idade'=>'',
        ]);
        $model2 = new SignupForm([
            'telemovel'=>'956658987',
        ]);

        expect_not($model->signup());
        expect_not($model2->signup());
        expect_that($model->getErrors('username'));
        expect_that($model->getErrors('email'));
        expect_that($model->getErrors('telemovel'));
        expect_that($model->getErrors('primeiro_nome'));
        expect_that($model->getErrors('ultimo_nome'));
        expect_that($model->getErrors('genero'));
        expect_that($model->getErrors('idade'));

        expect_that($model2->getErrors('telemovel'));

        expect($model->getFirstError('username'))
            ->equals('This username has already been taken.');
        expect($model->getFirstError('email'))
            ->equals('This email address has already been taken.');
        expect($model->getFirstError('telemovel'))
            ->equals('Mobile phone number must be 9 digits.');
        expect($model->getFirstError('primeiro_nome'))
            ->equals('The name must be at least 2 digits.');
        expect($model->getFirstError('ultimo_nome'))
            ->equals('The lastname must be at least 2 digits.');
        expect($model->getFirstError('genero'))
            ->equals('Indicate your gender.');
        expect($model->getFirstError('idade'))
            ->equals('Enter an age.');

        expect($model2->getFirstError('telemovel'))
            ->equals('This mobile phone number is already registered.');


    }
}
