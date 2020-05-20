<?php

namespace common\modules\roles\models;

use Yii;
use common\modules\projectexchange\models\Person;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property string|null $verification_token
 * @property int $PersonID
 */
class User extends \yii\db\ActiveRecord
{
    public $UserRoles;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at', 'PersonID'], 'required'],
            [['status', 'created_at', 'updated_at', 'PersonID'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email', 'verification_token'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
            [['UserRoles'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('ML', 'ID'),
            'username' => Yii::t('ML', 'Username'),
            'auth_key' => Yii::t('ML', 'Auth Key'),
            'password_hash' => Yii::t('ML', 'Password Hash'),
            'password_reset_token' => Yii::t('ML', 'Password Reset Token'),
            'email' => Yii::t('ML', 'Email'),
            'status' => Yii::t('ML', 'Status'),
            'created_at' => Yii::t('ML', 'Created At'),
            'updated_at' => Yii::t('ML', 'Updated At'),
            'verification_token' => Yii::t('ML', 'Verification Token'),
            'PersonID' => Yii::t('ML', 'Person ID'),
        ];
    }

    public function getUserRoleLink(){
        return $this->hasMany(UserRoleLink::className(), ['UserID' => 'id']);
    }

    public function getUserRoleLinkNameList(){
        $res = $this->userRoleLink;
        $output = [];
        foreach($res as $r){
            $output[] = $r->userRole->Name;
        }
        return $output;
    }

    public function getPerson(){
        return $this->hasOne(Person::className(), ['ID' => 'PersonID']);
    }

    public function getPersonName(){
        $r = $this->person;
        return isset($r) ? $r->LastName.' '.$r->FirstName.' '.$r->MiddleName : '';
    }

    public static function checkAccess($role_name){
        return in_array($role_name, ($r = Yii::$app->user->identity->myuser->userRoleLinkNameList) ? $r : []);
    }
}
