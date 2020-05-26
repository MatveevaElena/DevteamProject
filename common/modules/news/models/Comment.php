<?php

namespace common\modules\news\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property int $ID
 * @property string|null $Text
 * @property string|null $Date
 * @property int $PersonID
 * @property int $NewsID
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db_news');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Text'], 'string'],
            [['Date'], 'safe'],
            [['PersonID', 'NewsID'], 'required'],
            [['PersonID', 'NewsID'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('ML', 'ID'),
            'Text' => Yii::t('ML', 'Text'),
            'Date' => Yii::t('ML', 'Date'),
            'PersonID' => Yii::t('ML', 'Person ID'),
            'NewsID' => Yii::t('ML', 'News ID'),
        ];
    }
}
