<?php
namespace common\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 * @property User|null $user This property is read-only.
 */

class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user;

    public $reCaptcha;
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
            // reCaptha
            [['reCaptcha'], \himiklab\yii2\recaptcha\ReCaptchaValidator::className(), 'secret' => '6LfnczUUAAAAACfPcPQgj2FcN_U63rTYvWTMJH4O', 'uncheckedMessage' => 'Please confirm that you are not a bot.'],
            //[[], \himiklab\yii2\recaptcha\ReCaptchaValidator::className(), 'secret' => '6LfnczUUAAAAACfPcPQgj2FcN_U63rTYvWTMJH4O'],
            //[[], \himiklab\yii2\recaptcha\ReCaptchaValidator::className()]
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }
        
        return false;
    }

    // public function login()
    // {
    //         if($this->_identity===null)
    //         {
    //                 $this->_identity=new UserIdentity($this->username,$this->password);
    //                 $this->_identity->authenticate();
    //         }
    //         if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
    //         {
    //                 $duration=$this->rememberMe ? 3600*1*1 : 0; // 30 days
    //                 Yii::app()->user->login($this->_identity,$duration);
    //                 return true;
    //         }
    //         else
    //                 return false;
    // }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
}
