<?php

namespace common\modules\projectexchange\models;

use Yii;

/**
 * This is the model class for table "request_type".
 *
 * @property int $ID
 * @property string|null $Name
 */
class RequestType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'request_type';
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
