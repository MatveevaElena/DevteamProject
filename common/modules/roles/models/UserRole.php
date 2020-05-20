<?php

namespace common\modules\roles\models;

use Yii;

/**
 * This is the model class for table "user_role".
 *
 * @property int $ID
 * @property string $Name
 * @property string|null $Abbreviation
 * @property string|null $Description
 */
class UserRole extends \yii\db\ActiveRecord
{
    public $test_array;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_role';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Name'], 'required'],
            [['Name'], 'string', 'max' => 255],
            [['Abbreviation'], 'string', 'max' => 45],
            [['Description'], 'string', 'max' => 511],
            [['Name'], 'unique'],
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
            'Abbreviation' => Yii::t('ML', 'Abbreviation'),
            'Description' => Yii::t('ML', 'Description'),
        ];
    }
}
