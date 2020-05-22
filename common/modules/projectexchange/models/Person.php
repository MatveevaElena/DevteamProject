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
            'ID' => Yii::t('ML', 'ID'),
            'LastName' => Yii::t('ML', 'Last Name'),
            'FirstName' => Yii::t('ML', 'First Name'),
            'MiddleName' => Yii::t('ML', 'Middle Name'),
            'BirthDate' => Yii::t('ML', 'Birth Date'),
        ];
    }

    public function getFio(){
        return trim($this->LastName.' '.$this->FirstName.' '.$this->MiddleName);
    }

    public function getFioShort(){
        return trim($this->LastName.' '.mb_substr($this->FirstName,0,1).'. '.mb_substr($this->MiddleName,0,1).'.');
    }
}
