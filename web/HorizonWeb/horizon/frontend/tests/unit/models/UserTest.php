<?php namespace frontend\tests;

use common\fixtures\UserFixture;
use common\models\Atividade;
use common\models\User;

class UserTest extends \Codeception\Test\Unit
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

    // tests
    public function testUserId_AndExists_True()
    {
        $User = new User([
            'username' => 'erau',
            'auth_key' => 'tUu1qHcde0diwUol3xeI-18MuHkkprQI',
            // password_0
            'password_hash' => '$2y$13$nJ1WDlBaGcbCdbNC5.5l4.sgy.OMEKCqtDQOdQ2OWpgiKRWYyzzne',
            'password_reset_token' => 'RkD_Jw0_8HEedzLk7MM-ZKEFfYR7VbMr_1392559490',
            'created_at' => '1392559490',
            'updated_at' => '1392559490',
            'email' => 'sfriesen@jenkins.info',
            'primeiro'=> 'erau',
            'apelido'=>'dos santos',
            'telemovel'=>'956859987',
            'idade'=>'32',
            'genero'=>'masculino',
            'distancia_total'=>'3500',
            'n_volta_total' =>'40',
            'ganho_elevacao'=>'35625',
            'maior_volta'=>'304',
            'n_corridas'=>'56',
            'tempo_total'=>'560',
        ]);
        //it must exist a user id 1 in profiles table;

        $this->assertTrue($User->validate(["username"]));

    }
    public function testUserMorethancharacters()
    {
        $User = new User([
            'username' => 'erau',
            'auth_key' => 'tUu1qHcde0diwUol3xeI-18MuHkkprQI',
            // password_0
            'password_hash' => '$2y$13$nJ1WDlBaGcbCdbNC5.5l4.sgy.OMEKCqtDQOdQ2OWpgiKRWYyzzne',
            'password_reset_token' => 'RkD_Jw0_8HEedzLk7MM-ZKEFfYR7VbMr_1392559490',
            'created_at' => '1392559490',
            'updated_at' => '1392559490',
            'email' => 'sfriesen@jenkins.info',
            'primeiro'=> 'erau',
            'apelido'=>'dos santos',
            'telemovel'=>'95685998726226',
            'idade'=>'32',
            'genero'=>'masculino',
            'distancia_total'=>'3500',
            'n_volta_total' =>'40',
            'ganho_elevacao'=>'35625',
            'maior_volta'=>'304',
            'n_corridas'=>'56',
            'tempo_total'=>'560',
        ]);
        //it must exist a user id 1 in profiles table;

        $this->tester->dontSeeRecord('common\models\user',['username'=>'erau']);

    }
    public function testinsereuser()
    {
        $user = new User();
        $user->username = 'tigogo';
        $user->email = 'tigogo@gmail.com';
        $user->setPassword('123456789');
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        $user->primeiro = 'Tiago';
        $user->apelido= 'Jorge';
        $user->genero= 'Masculino';
        $user->telemovel='915256236';
        $user->idade= '12';
        $user->distancia_total = 0;
        $user->n_corridas = 0;
        $user->n_volta_total = 0;
        $user->ganho_elevacao = 0;
        $user->maior_volta = 0;
        $user->tempo_total = 0;
        $user->save();
            $this->tester->seeRecord('common\models\user', ['username'=>'tigogo']);
    }
    public function testgetComentarios()
    {
        $User = new User([
            'username' => 'erau',
            'auth_key' => 'tUu1qHcde0diwUol3xeI-18MuHkkprQI',
            // password_0
            'password_hash' => '$2y$13$nJ1WDlBaGcbCdbNC5.5l4.sgy.OMEKCqtDQOdQ2OWpgiKRWYyzzne',
            'password_reset_token' => 'RkD_Jw0_8HEedzLk7MM-ZKEFfYR7VbMr_1392559490',
            'created_at' => '1392559490',
            'updated_at' => '1392559490',
            'email' => 'sfriesen@jenkins.info',
            'primeiro'=> 'erau',
            'apelido'=>'dos santos',
            'telemovel'=>'956859987',
            'idade'=>'32',
            'genero'=>'masculino',
            'distancia_total'=>'3500',
            'n_volta_total' =>'40',
            'ganho_elevacao'=>'35625',
            'maior_volta'=>'304',
            'n_corridas'=>'56',
            'tempo_total'=>'560',
        ]);

        $User->getComentarios();


    }
    public function testgetEquipamentos()
    {
        $User = new User([
            'username' => 'erau',
            'auth_key' => 'tUu1qHcde0diwUol3xeI-18MuHkkprQI',
            // password_0
            'password_hash' => '$2y$13$nJ1WDlBaGcbCdbNC5.5l4.sgy.OMEKCqtDQOdQ2OWpgiKRWYyzzne',
            'password_reset_token' => 'RkD_Jw0_8HEedzLk7MM-ZKEFfYR7VbMr_1392559490',
            'created_at' => '1392559490',
            'updated_at' => '1392559490',
            'email' => 'sfriesen@jenkins.info',
            'primeiro'=> 'erau',
            'apelido'=>'dos santos',
            'telemovel'=>'956859987',
            'idade'=>'32',
            'genero'=>'masculino',
            'distancia_total'=>'3500',
            'n_volta_total' =>'40',
            'ganho_elevacao'=>'35625',
            'maior_volta'=>'304',
            'n_corridas'=>'56',
            'tempo_total'=>'560',
        ]);

        $User->getEquipamentos();


    }





}