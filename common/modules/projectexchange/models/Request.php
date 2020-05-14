<?php

namespace common\modules\projectexchange\models;

use Yii;
use common\modules\projectexchange\models\RequestStatus;

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
 * @property string|null $DeletedDate
 * @property int $StatusID
 * @property int $TypeID
 * @property int $PersonID
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
            [['PersonCount', 'ParentID', 'IsActual', 'StatusID', 'TypeID', 'PersonID'], 'integer'],
            [['Tasks', 'Objective', 'Issue', 'ProductResults'], 'string'],
            [['RequestDate', 'VersionDate', 'DeletedDate', 'TZ'], 'safe'],
            [['ParentID', 'StatusID', 'PersonID'], 'required'],
            [['Cost'], 'string', 'max' => 200],
            // [['PersonID'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['PersonID' => 'ParentID']],
            // [['StatusID'], 'exist', 'skipOnError' => true, 'targetClass' => RequestStatus::className(), 'targetAttribute' => ['StatusID' => 'ID']],
            // [['TypeID'], 'exist', 'skipOnError' => true, 'targetClass' => RequestType::className(), 'targetAttribute' => ['TypeID' => 'ID']],
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
            'DeletedDate' => Yii::t('app', 'Delete Date'),
            'StatusID' => Yii::t('app', 'Status ID'),
            'TypeID' => Yii::t('app', 'Type ID'),
            'PersonID' => Yii::t('app', 'Person ID'),
        ];
    }

    public function save($runValidation = true, $attributeNames = NULL)
    {
        $this->PersonID = Yii::$app->user->id;
        $this->StatusID = $this->isNewRecord ? 1 : $this->StatusID;
        // $this->RequestDate = $this->isNewRecord ? date_create()->format('Ymd') : $this->RequestDate;
        return parent::save($runValidation = true, $attributeNames = NULL);
    }

    public function getStatus(){
        return $this->hasOne(RequestStatus::className(), ['ID'=>'StatusID']);
    }

    public function getStatusName(){
        return (($st = $this->status) ? $st->Name : 'Статус не указан');
    }

}
