<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;
use common\modules\projectexchange\models\Person;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $LastName;
    public $FirstName;
    public $MiddleName;
    public $BirthDate;


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

            [['LastName', 'FirstName', 'MiddleName', 'BirthDate'], 'trim'],
            [['LastName', 'FirstName', 'BirthDate'], 'required'],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
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
        $db = Yii::$app->db;
        $transaction = $db->beginTransaction();
        $fl = true;
        try {

            $person = new Person;
            $person->LastName = $this->LastName;
            $person->FirstName = $this->FirstName;
            $person->MiddleName = $this->MiddleName;
            $person->BirthDate = $this->BirthDate;
            $fl = $fl && $person->save();
            
            $user = new User();
            $user->PersonID = $person->ID;
            $user->username = $this->username;
            $user->email = $this->email;
            $user->status = 10;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            $user->generateEmailVerificationToken();
            $fl = $fl && $user->save() && $this->sendEmail($user);
            if($fl){
                $transaction->commit();
            }else{
                $transaction->rollBack();
            }
            return $fl;
        } catch(\Exception $e) {
            $transaction->rollBack();
            throw $e;
        } catch(\Throwable $e) {
            $transaction->rollBack();
        }

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
