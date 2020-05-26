<?php

namespace common\modules\news\models;

use Yii;

/**
 * This is the model class for table "news_tag_link".
 *
 * @property int $ID
 * @property int $NewsID
 * @property int $TagID
 */
class NewsTagLink extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news_tag_link';
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
            [['NewsID', 'TagID'], 'required'],
            [['NewsID', 'TagID'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('ML', 'ID'),
            'NewsID' => Yii::t('ML', 'News ID'),
            'TagID' => Yii::t('ML', 'Tag ID'),
        ];
    }
}
