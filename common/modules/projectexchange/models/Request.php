<?php

namespace common\modules\projectexchange\models;

use Yii;
use common\modules\projectexchange\models\RequestStatus;
use common\modules\projectexchange\models\RequestTupe;

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
            'ID' => Yii::t('ML', 'ID'),
            'PersonCount' => Yii::t('ML', 'Person Count'),
            'Tasks' => Yii::t('ML', 'Tasks'),
            'Objective' => Yii::t('ML', 'Objective'),
            'Issue' => Yii::t('ML', 'Issue'),
            'ProductResults' => Yii::t('ML', 'Product Results'),
            'Cost' => Yii::t('ML', 'Cost'),
            'TZ' => Yii::t('ML', 'Tz'),
            'RequestDate' => Yii::t('ML', 'Request Date'),
            'ParentID' => Yii::t('ML', 'Parent ID'),
            'IsActual' => Yii::t('ML', 'Is Actual'),
            'VersionDate' => Yii::t('ML', 'Version Date'),
            'DeletedDate' => Yii::t('ML', 'Deleted Date'),
            'StatusID' => Yii::t('ML', 'Status ID'),
            'TypeID' => Yii::t('ML', 'Type ID'),
            'PersonID' => Yii::t('ML', 'Person ID'),
        ];
    }

    public function save($runValidation = true, $attributeNames = NULL)
    {
        $this->PersonID = $this->isNewRecord ? Yii::$app->user->identity->PersonID : $this->PersonID;
        $this->StatusID = $this->isNewRecord ? 1 : $this->StatusID;
        $this->RequestDate = $this->isNewRecord ? date_create()->format('Ymd') : $this->RequestDate;
        return parent::save($runValidation = true, $attributeNames = NULL);
    }

    public function getStatus(){
        return $this->hasOne(RequestStatus::className(), ['ID'=>'StatusID']);
    }

    public function getStatusName(){
        return (($st = $this->status) ? $st->Name : 'Статус не указан');
    }
    public function getType(){
        return $this->hasOne(RequestType::className(), ['ID'=>'TypeID']);
    }
    public function getTypeName(){
        return (($tp = $this->type) ? $tp->Name : 'Тип не указан');
    }
    
    public function getPerson(){
        return $this->hasOne(Person::className(), ['ID'=>'PersonID']);
    }

}
