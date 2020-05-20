<?php

namespace common\modules\roles\models;

use Yii;

/**
 * This is the model class for table "user_role_link".
 *
 * @property int $UserID
 * @property int $RoleID
 */
class UserRoleLink extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_role_link';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['UserID', 'RoleID'], 'required'],
            [['UserID', 'RoleID'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'UserID' => Yii::t('ML', 'User ID'),
            'RoleID' => Yii::t('ML', 'Role ID'),
        ];
    }
    
    public function getUserRole(){
        return $this->hasOne(UserRole::className(), ['ID' => 'RoleID']);
    }
}
