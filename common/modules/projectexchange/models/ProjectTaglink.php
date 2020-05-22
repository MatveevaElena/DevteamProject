<?php

namespace common\modules\projectexchange\models;

use Yii;

/**
 * This is the model class for table "project_taglink".
 *
 * @property int $ID
 * @property int $ProjectTagID
 * @property int $ProjectID
 */
class ProjectTaglink extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project_taglink';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ProjectTagID', 'ProjectParentID'], 'required'],
            [['ProjectTagID', 'ProjectParentID'], 'integer'],
            // [['ProjectID'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['ProjectID' => 'ID']],
            // [['ProjectTagID'], 'exist', 'skipOnError' => true, 'targetClass' => ProjectTag::className(), 'targetAttribute' => ['ProjectTagID' => 'ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('ML', 'ID'),
            'ProjectTagID' => Yii::t('ML', 'Project Tag ID'),
            'ProjectParentID' => Yii::t('ML', 'Project Parent ID'),
        ];
    }
}
