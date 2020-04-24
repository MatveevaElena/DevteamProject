<?php

namespace common\modules\projectexchange\models;

use Yii;

/**
 * This is the model class for table "team".
 *
 * @property int $ID
 * @property string|null $Name
 * @property int|null $TeamCol
 */
class Team extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'team';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['TeamCol'], 'integer'],
            [['Name'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'Name' => Yii::t('app', 'Name'),
            'TeamCol' => Yii::t('app', 'Team Col'),
        ];
    }
}
