<?php

namespace common\modules\news\models;

use Yii;

/**
 * This is the model class for table "like_news".
 *
 * @property int $ID
 * @property int $PersonID
 * @property int $NewsID
 */
class LikeNews extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'like_news';
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
            [['ID', 'PersonID', 'NewsID'], 'required'],
            [['ID', 'PersonID', 'NewsID'], 'integer'],
            [['ID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('ML', 'ID'),
            'PersonID' => Yii::t('ML', 'Person ID'),
            'NewsID' => Yii::t('ML', 'News ID'),
        ];
    }
}
