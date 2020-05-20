<?php

namespace common\modules\projectexchange\models;

use Yii;

/**
 * This is the model class for table "request_entry".
 *
 * @property int $ID
 * @property string|null $RequestDate
 * @property string|null $Experience
 * @property string|null $Target
 * @property int $ParentID
 * @property int|null $IsActual
 * @property string|null $VersionDate
 * @property string|null $DeletedDate
 * @property int|null $StoredFileID
 * @property string|null $request_entrycol
 * @property int $ProjectParentID
 * @property int $StatusID
 * @property int $PersonID
 */
class RequestEntry extends \common\components\VersionedActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'request_entry';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['RequestDate', 'VersionDate', 'DeletedDate'], 'safe'],
            [['Experience'], 'string'],
            [['ParentID', 'StatusID', 'PersonID'], 'required'],
            [['ParentID', 'IsActual', 'StoredFileID', 'ProjectParentID', 'StatusID', 'PersonID'], 'integer'],
            [['Target'], 'string', 'max' => 45],
           // [['PersonID'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['PersonID' => 'ParentID']],
           // [['ProjectParentID'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['ProjectParentID' => 'ParentID']],
           // [['StatusID'], 'exist', 'skipOnError' => true, 'targetClass' => RequestStatus::className(), 'targetAttribute' => ['StatusID' => 'ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('ML', 'ID'),
            'RequestDate' => Yii::t('ML', 'Request Date'),
            'Experience' => Yii::t('ML', 'Experience'),
            'Target' => Yii::t('ML', 'Target'),
            'ParentID' => Yii::t('ML', 'Parent ID'),
            'IsActual' => Yii::t('ML', 'Is Actual'),
            'VersionDate' => Yii::t('ML', 'Version Date'),
            'DeletedDate' => Yii::t('ML', 'Delete Date'),
            'StoredFileID' => Yii::t('ML', 'Stored File ID'),
            'ProjectParentID' => Yii::t('ML', 'Project Parent ID'),
            'StatusID' => Yii::t('ML', 'Status ID'),
            'PersonID' => Yii::t('ML', 'Person ID'),
        ];
    }
    
    public function save($runValidation = true, $attributeNames = NULL)
    {
        if(!$this->PersonID)$this->PersonID = Yii::$app->user->identity->PersonID;
        if(!$this->StatusID)$this->StatusID = 1;
        if(!$this->RequestDate)$this->RequestDate = date_create()->format('d.m.Y');
        return parent::save($runValidation = true, $attributeNames = NULL);
    }

    public function getStatus(){
        return $this->hasOne(RequestStatus::className(), ['ID'=>'StatusID']);
    }

    public function getStatusName(){
        return (($st = $this->status) ? $st->Name : 'Статус не указан');
    }
    public function getProject(){
        return $this->hasOne(Project::className(), ['ParentID' => 'ProjectParentID']);
    }

}
