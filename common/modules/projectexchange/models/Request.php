<?php

namespace common\modules\projectexchange\models;

use Yii;

/**
 * This is the model class for table "request".
 *
 * @property int $ID
 * @property int|null $PersonCount
 * @property string|null $Tasks
 * @property string|null $Objective
 * @property string|null $Issue
 * @property string|null $ProductResults
 * @property string|null $Cost
 * @property int|null $TZ
 * @property string|null $RequestDate
 * @property int $ParentID
 * @property int|null $IsActual
 * @property string|null $VersionDate
 * @property string|null $DeleteDate
 * @property int $StatusID
 * @property int $TypeID
 * @property int $PersonParentID
 */
class Request extends \common\components\VersionedActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'request';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PersonCount', 'TZ', 'ParentID', 'IsActual', 'StatusID', 'TypeID', 'PersonParentID'], 'integer'],
            [['Tasks', 'Objective', 'Issue', 'ProductResults'], 'string'],
            [['RequestDate', 'VersionDate', 'DeleteDate'], 'safe'],
            [['ParentID', 'StatusID', 'TypeID', 'PersonParentID'], 'required'],
            [['Cost'], 'string', 'max' => 200],
            [['PersonParentID'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['PersonParentID' => 'ParentID']],
            [['StatusID'], 'exist', 'skipOnError' => true, 'targetClass' => RequestStatus::className(), 'targetAttribute' => ['StatusID' => 'ID']],
            [['TypeID'], 'exist', 'skipOnError' => true, 'targetClass' => RequestType::className(), 'targetAttribute' => ['TypeID' => 'ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'PersonCount' => Yii::t('app', 'Person Count'),
            'Tasks' => Yii::t('app', 'Tasks'),
            'Objective' => Yii::t('app', 'Objective'),
            'Issue' => Yii::t('app', 'Issue'),
            'ProductResults' => Yii::t('app', 'Product Results'),
            'Cost' => Yii::t('app', 'Cost'),
            'TZ' => Yii::t('app', 'Tz'),
            'RequestDate' => Yii::t('app', 'Request Date'),
            'ParentID' => Yii::t('app', 'Parent ID'),
            'IsActual' => Yii::t('app', 'Is Actual'),
            'VersionDate' => Yii::t('app', 'Version Date'),
            'DeleteDate' => Yii::t('app', 'Delete Date'),
            'StatusID' => Yii::t('app', 'Status ID'),
            'TypeID' => Yii::t('app', 'Type ID'),
            'PersonParentID' => Yii::t('app', 'Person Parent ID'),
        ];
    }
}
