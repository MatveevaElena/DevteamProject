<?php

namespace common\modules\projectexchange\models;

use Yii;
use Yii\base\Model;

class Test extends Model
{
    public $Field1;
    public $Field2;
    public $Field3;
    public $Field4;
    public $Field5;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Field1', 'Field2', 'Field3', 'Field4', 'Field5'], 'safe'],
            [['Field1', 'Field2'], 'required'],
        ];
    }
   
}
