<?php

namespace common\modules\projectexchange\models;

use Yii;

/**
 * This is the model class for table "personlink_status".
 *
 * @property int $ID
 * @property string|null $Name
 */
class PersonlinkStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'personlink_status';
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
            'ID' => Yii::t('ML', 'ID'),
            'Name' => Yii::t('ML', 'Name'),
        ];
    }
}
