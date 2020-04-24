<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "person".
 *
 * @property int $ID
 * @property string $LastName
 * @property string $FirstName
 * @property string|null $MiddleName
 * @property string $BirthDate
 * @property int $ParentID
 * @property int|null $IsActual
 * @property string|null $VersionDate
 * @property string|null $DeleteDate
 */
class Person extends \common\components\VersionedActiveRecord
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
            [['LastName', 'FirstName', 'BirthDate', 'ParentID'], 'required'],
            [['BirthDate', 'VersionDate', 'DeleteDate'], 'safe'],
            [['ParentID', 'IsActual'], 'integer'],
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
            'ParentID' => Yii::t('app', 'Parent ID'),
            'IsActual' => Yii::t('app', 'Is Actual'),
            'VersionDate' => Yii::t('app', 'Version Date'),
            'DeleteDate' => Yii::t('app', 'Delete Date'),
        ];
    }
}
