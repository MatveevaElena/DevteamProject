<?php

namespace common\modules\news\models;

use Yii;

/**
 * This is the model class for table "news_person_link".
 *
 * @property int $ID
 * @property int $NewsID
 * @property int $PersonID
 */
class NewsPersonLink extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news_person_link';
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
            [['NewsID', 'PersonID'], 'required'],
            [['NewsID', 'PersonID'], 'integer'],
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
            'PersonID' => Yii::t('ML', 'Person ID'),
        ];
    }
}
