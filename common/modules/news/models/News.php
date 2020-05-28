<?php

namespace common\modules\news\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $ID
 * @property string|null $Date
 * @property string|null $Authors
 * @property string|null $Img
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

    public function getTitle()
    {
        return $this->Title;
    }

    public function getDescription()
    {
        return $this->Description;
    }

    public function getMain()
    {
        return $this->Main;
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

    public function increaseViewCount()
    {
        $this->Views = $this->Views+1;
        return $this->save();
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
            [['Views'], 'integer'],
            [['Main'], 'string'],
            [['Authors', 'Title'], 'string', 'max' => 200],
            [['Img'], 'string', 'max' => 100],
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
            'Img' => Yii::t('ML', 'Img'),
            'Views' => Yii::t('ML', 'Views'),
            'Title' => Yii::t('ML', 'Title'),
            'Description' => Yii::t('ML', 'Description'),
            'Main' => Yii::t('ML', 'Main'),
        ];
    }
}
