<?php

namespace common\modules\projectexchange\models;

use Yii;

/**
 * This is the model class for table "personlink_role".
 *
 * @property int $ID
 * @property string|null $Name
 */
class PersonlinkRole extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'personlink_role';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
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
        ];
    }
}
