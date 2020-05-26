<?php

namespace common\modules\news\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $ID
 * @property string|null $Date
 * @property string|null $Authors
 * @property int $ImgID
 * @property int|null $Views
 * @property string|null $Title
 * @property string|null $Description
 * @property string|null $Main
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    public function getDayDate()
    {
        return date_create($this->Date)->format('d.m.Y');
    }

    public function getLikes()
    {
        return $this->hasMany(LikeNews::className(), ['NewsID' => 'ID']);
    }

    public function getLikesCount()
    {
        return count($this->likes);
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
            [['Date'], 'safe'],
            [['ImgID'], 'required'],
            [['ImgID', 'Views'], 'integer'],
            [['Main'], 'string'],
            [['Authors', 'Title'], 'string', 'max' => 200],
            [['Description'], 'string', 'max' => 400],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('ML', 'ID'),
            'Date' => Yii::t('ML', 'Date'),
            'Authors' => Yii::t('ML', 'Authors'),
            'ImgID' => Yii::t('ML', 'Img ID'),
            'Views' => Yii::t('ML', 'Views'),
            'Title' => Yii::t('ML', 'Title'),
            'Description' => Yii::t('ML', 'Description'),
            'Main' => Yii::t('ML', 'Main'),
        ];
    }
}
