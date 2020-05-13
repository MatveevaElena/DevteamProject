<?php

namespace common\modules\projectexchange\models;

use Yii;

/**
 * This is the model class for table "person".
 *
 * @property int $ID
 * @property string $LastName
 * @property string $FirstName
 * @property string|null $MiddleName
 * @property string $BirthDate
 */
class Person extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'person';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['LastName', 'FirstName', 'BirthDate'], 'required'],
            [['BirthDate'], 'safe'],
            [['LastName', 'FirstName', 'MiddleName'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'LastName' => Yii::t('app', 'Last Name'),
            'FirstName' => Yii::t('app', 'First Name'),
            'MiddleName' => Yii::t('app', 'Middle Name'),
            'BirthDate' => Yii::t('app', 'Birth Date'),
        ];
    }
}
