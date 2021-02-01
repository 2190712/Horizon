<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;



/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $primeiro_nome;
    public $ultimo_nome;
    public $idade;
    public $genero;
    public $telemovel;




    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],

            ['telemovel', 'trim'],
            ['telemovel', 'integer', 'message' => 'Incorrect mobile phone number.'],
            ['telemovel', 'required', 'message' => 'Enter a mobile phone number.'],
            ['telemovel', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This mobile phone number is already registered.'],
            [
                'telemovel', 'string', 'min' => 9, 'max' => 9,
                'tooShort' => 'Mobile phone number must be 9 digits.',
                'tooLong' => 'Mobile phone number must be 9 digits.'
            ],
            ['primeiro_nome', 'trim'],
            ['primeiro_nome', 'required', 'message' => 'Enter a first name.'],
            [
                'primeiro_nome', 'string', 'min' => 2, 'max' => 50,
                'tooShort' => 'The name must be at least 2 digits.',
                'tooLong' => 'The name cannot exceed 50 digits.'
            ],
            ['ultimo_nome', 'trim'],
            ['ultimo_nome', 'required', 'message' => 'Enter a lastname.'],
            [
                'ultimo_nome', 'string', 'min' => 2, 'max' => 50,
                'tooShort' => 'The lastname must be at least 2 digits.',
                'tooLong' => 'The lastname cannot exceed 50 digits.'
            ],

            ['ultimo_nome', 'trim'],
            ['genero', 'required', 'message' => 'Indicate your gender.'],

            ['idade', 'trim'],
            ['idade', 'required', 'message' => 'Enter an age.'],


        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        $user->primeiro = $this->primeiro_nome;
        $user->apelido= $this->ultimo_nome;
        $user->genero= $this->genero;
        $user->telemovel=$this->telemovel;
        $user->idade=$this->idade;
        $user->distancia_total = 0;
        $user->n_corridas = 0;
        $user->n_volta_total = 0;
        $user->ganho_elevacao = 0;
        $user->maior_volta = 0;
        $user->tempo_total = 0;
        $user->save();

        $auth = \Yii::$app->authManager;
        $authorRole = $auth->getRole('author');
        $auth->assign($authorRole, $user->getId());

        return $user && $this->sendEmail($user);;


    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}
