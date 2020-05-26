<?php

namespace common\modules\news\models;

use Yii;

/**
 * This is the model class for table "like_comment".
 *
 * @property int $ID
 * @property int $PersonID
 * @property int $CommentID
 */
class LikeComment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'like_comment';
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
            [['PersonID', 'CommentID'], 'required'],
            [['PersonID', 'CommentID'], 'integer'],
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
            'CommentID' => Yii::t('ML', 'Comment ID'),
        ];
    }
}
