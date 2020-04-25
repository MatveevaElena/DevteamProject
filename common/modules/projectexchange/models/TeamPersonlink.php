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
 * @property int $PersonParentID
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
            [['ParentID', 'RoleID', 'TeamID', 'StatusID', 'PersonParentID'], 'required'],
            [['IsActual', 'RoleID', 'TeamID', 'StatusID', 'PersonParentID'], 'integer'],
            [['VersionDate', 'DeletedDate'], 'safe'],
            [['ParentID'], 'string', 'max' => 45],
            [['PersonParentID'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['PersonParentID' => 'ParentID']],
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
            'PersonParentID' => Yii::t('app', 'Person Parent ID'),
        ];
    }
}
