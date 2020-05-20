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
            [['ParentID', 'ProjectParentID', 'StatusID', 'PersonID'], 'required'],
            [['ParentID', 'IsActual', 'StoredFileID', 'ProjectParentID', 'StatusID', 'PersonID'], 'integer'],
            [['Target', 'request_entrycol'], 'string', 'max' => 45],
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
            'ID' => Yii::t('app', 'ID'),
            'RequestDate' => Yii::t('app', 'Request Date'),
            'Experience' => Yii::t('app', 'Experience'),
            'Target' => Yii::t('app', 'Target'),
            'ParentID' => Yii::t('app', 'Parent ID'),
            'IsActual' => Yii::t('app', 'Is Actual'),
            'VersionDate' => Yii::t('app', 'Version Date'),
            'DeletedDate' => Yii::t('app', 'Delete Date'),
            'StoredFileID' => Yii::t('app', 'Stored File ID'),
            'request_entrycol' => Yii::t('app', 'Request Entrycol'),
            'ProjectParentID' => Yii::t('app', 'Project Parent ID'),
            'StatusID' => Yii::t('app', 'Status ID'),
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
    public function getProject(){
        return $this->hasOne(Project::className(), ['ParentID' => 'ProjectParentID']);
    }

}
