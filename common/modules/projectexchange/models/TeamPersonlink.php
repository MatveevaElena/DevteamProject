<?php

namespace common\modules\projectexchange\models;

use Yii;

/**
 * This is the model class for table "team_personlink".
 *
 * @property int $ID
 * @property string $ParentID
 * @property int|null $IsActual
 * @property string|null $VersionDate
 * @property string|null $DeletedDate
 * @property int $RoleID
 * @property int $TeamID
 * @property int $StatusID
 * @property int $PersonID
 */
class TeamPersonlink extends \common\components\VersionedActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'team_personlink';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ParentID', 'RoleID', 'TeamID', 'StatusID', 'PersonID'], 'required'],
            [['ParentID', 'IsActual', 'RoleID', 'TeamID', 'StatusID', 'PersonID'], 'integer'],
            [['VersionDate', 'DeletedDate'], 'safe'],
            [['PersonID'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['PersonID' => 'ID']],
            [['RoleID'], 'exist', 'skipOnError' => true, 'targetClass' => PersonlinkRole::className(), 'targetAttribute' => ['RoleID' => 'ID']],
            [['StatusID'], 'exist', 'skipOnError' => true, 'targetClass' => PersonlinkStatus::className(), 'targetAttribute' => ['StatusID' => 'ID']],
            [['TeamID'], 'exist', 'skipOnError' => true, 'targetClass' => Team::className(), 'targetAttribute' => ['TeamID' => 'ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'ParentID' => Yii::t('app', 'Parent ID'),
            'IsActual' => Yii::t('app', 'Is Actual'),
            'VersionDate' => Yii::t('app', 'Version Date'),
            'DeletedDate' => Yii::t('app', 'Delete Date'),
            'RoleID' => Yii::t('app', 'Role ID'),
            'TeamID' => Yii::t('app', 'Team ID'),
            'StatusID' => Yii::t('app', 'Status ID'),
            'PersonID' => Yii::t('app', 'Person ID'),
        ];
    }

    public function getTeam(){
        return $this->hasOne(Team::className(),['ID' => 'TeamID']);
    }
    
    public function getRole(){
        return $this->hasOne(PersonlinkRole::className(),['ID' => 'RoleID']);
    }
    
    public function getStatus(){
        return $this->hasOne(PersonlinkStatus::className(),['ID' => 'StatusID']);
    }

    public function getPerson(){
        return $this->hasOne(Person::className(),['ID' => 'PersonID']);
    }
}
