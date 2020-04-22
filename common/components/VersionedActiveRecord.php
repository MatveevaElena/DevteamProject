<?php
namespace common\components;

use Yii;
use yii\db\ActiveQuery;
use yii\helpers\ArrayHelper;

class VersionedActiveRecord extends \yii\db\ActiveRecord
{

    //column value can be null
    protected $_keyColumn = 'ParentID';
    
    //subparent, for multiple Versioned Models for one ParentID
    //column value can be null
    protected $_subKeyColumn = '';
    
    // automatically set to current date on create/update
    protected $_versionDateColumn = 'VersionDate';
    
    // automatically set to 0 for deleted, old updated rows
    // must have default value 1 in database
    protected $_actualityColumn = 'IsActual';
    
    // automatically set to current date on delete
    protected $_deletedDateColumn = 'DeletedDate';

    public static function versionColumn($columns = []) {
        return array_merge([
            //column value can be null
            'keyColumn'=>'ParentID',
            
            //subparent, for multiple Versioned Models for one ParentID
            //column value can be null
            'subKeyColumn' => '',
            
            // automatically set to current date on create/update
            'versionDateColumn' => 'VersionDate',
            
            // automatically set to 0 for deleted, old updated rows
            // must have default value 1 in database
            'actualityColumn' => 'IsActual',
            
            // automatically set to current date on delete
            'deletedDateColumn' => 'DeletedDate',
        ], $columns);
    }

    public static function getAttributeName($column = 'actualityColumn') {
        $model = get_called_class();
        return $model::versionColumn()[$column];
    }
    
    protected function bindAttributes(){
        $this->_keyColumn = self::getAttributeName('keyColumn');
        $this->_subKeyColumn = self::getAttributeName('subKeyColumn');
        $this->_versionDateColumn = self::getAttributeName('versionDateColumn');
        $this->_actualityColumn = self::getAttributeName('actualityColumn');
        $this->_deletedDateColumn = self::getAttributeName('deletedDateColumn');
    }
	
	public function clearVersionedAttributes($except = []) {
		foreach($this->getVersionedFields() as $attr) {
			if(trim($attr) && isset($this->$attr)  && !in_array($attr, $except)) {
				$this->$attr = null;
			}
		}
		$column = $this->_actualityColumn;
		$this->$column = 1;
		$column2 = $this->_keyColumn;
		$this->$column2 = 0;
	}
    
    /*
     * actualityColumn default 1
     */
    public function init() {
        parent::init();
        self::bindAttributes();
        if($this->isNewRecord) {
            $this->clearVersionedAttributes();
        }
    }
    
    public static function find() {
		$model = get_called_class();
        return parent::find()->where([$model::tableName().'.'.self::getAttributeName() => 1]);
    }
    
    public static function findOne($condition)
    {
        if (!ArrayHelper::isAssociative($condition)) {
            $actualityColumn = self::getAttributeName('actualityColumn');
            $primaryKey = static::primaryKey();
            $condition = [
                $primaryKey[0] => $condition,
                $actualityColumn =>1
            ];
        }
        return parent::findOne($condition);
    }
    
    public function afterFind() {
        parent::afterFind();
        $this->createOldAttributes();
    }
   
    protected function deleteInner($model = null) {
		if (is_null($model))
			$model = $this;

		$deletedDateColumn = $model->_deletedDateColumn;
		$isActualColumn = $this->_actualityColumn;	
		$model->$isActualColumn = 0;
		$model->$deletedDateColumn = date('d.m.Y H:i:s');
    }
    
    protected function getDeleteCriteria() {
        $keyColumn = $this->_keyColumn;
        $subKeyColumn = $this->_subKeyColumn;
        $isActualColumn = $this->_actualityColumn;

        $criteria = "{$isActualColumn} = 1 ";
        if (strlen(trim($this->$keyColumn))){
            $criteria .=" and {$keyColumn} = {$this->$keyColumn} ";
        }

        if (trim($subKeyColumn)){
            $subKeyColumnValue = $this->getOldAttribute($subKeyColumn) ? 
                $this->getOldAttribute($subKeyColumn) : $this->$subKeyColumn;
            if (strlen(trim($subKeyColumnValue))){
                $criteria .= " and {$subKeyColumn} = {$subKeyColumnValue} ";
            } else {
                $criteria .= " and ({$subKeyColumn} IS NULL OR {$subKeyColumn} = '')";
            }
        }
        return $criteria;
    }

    public function delete() {
		$isActualColumn = $this->_actualityColumn;
		$deletedDateColumn = $this->_deletedDateColumn;

		//see if some deleted
		$return = parent::updateAll(
			[
				$isActualColumn => 0,
				$this->_deletedDateColumn => date('d.m.Y H:i:s'),
			],
			$this->getDeleteCriteria()
		);

		$this->deleteInner();

		//return results
		return true;
    }
    
    /* not in ActiveRecord any more
    public function deleteByPk($pk,$condition='',$params=array())
    {
	    $model = $this->find()->andWhere([static::primaryKey()[0] => $pk])->andWhere($condition,$params)->one();
	    if (!is_null($model))
		return $model->delete() ? 1 : 0;
    }*/

    public static function directDeleteAll() {
        parent::deleteAll();
    }

    public static function directDelete() {
        parent::deleteAll();
    }

    public static function deleteAll($condition = '', $params = []) {
       $models = parent::find()->andWhere($condition, $params)->all();
	    $c = 0;
	    foreach($models as $model){
            $c += $model->delete() ? 1 : 0;
        }
	    return $c;
    }        
    
    /* not in ActiveRecord any more
    public function deleteAllByAttributes($attributes, $condition = '', $params = array()) {
	    $models = $this->model()->find()->andWhere($attributes)->andWhere($condition, $params)->all();
	    $c = 0;
	    foreach($models as $model)
		$c += $model->delete() ? 1 : 0;
	    return $c;
    }     
    */
    
    public function isChangedChildren() {
        return FALSE;
    }
    
    public function isChanged() {
        $result = count(array_diff_assoc($this->getOldAttributes(), $this->attributes)) > 0;
        return $result || $this->isChangedChildren();
    }
    
    public function isDeleting() {
        return $this->getOldAttribute($this->_actualityColumn) == 1 && $this->getAttribute($this->_actualityColumn) == 0;
    }
 
    public function directSave($runValidation = true, $attributeNames = null) {
        parent::save($runValidation, $attributeNames);
    }

    public function save($runValidation = true, $attributes = null) {
        $versionDateColumn = $this->_versionDateColumn;
        $isActualColumn = $this->_actualityColumn;
        $keyColumn = $this->_keyColumn;

        if (!$this->isDeleting()){
            if(!$this->isNewRecord && is_array($this->getOldAttributes())) {
                //check if something changed
                if (!$this->isChanged()) {
                    return $this->validate($attributes);//true;
                }
                $this->$versionDateColumn = date('d.m.Y H:i:s');
                foreach (static::primaryKey() as $column){
                    $this->$column = NULL;
                }
                $this->getPrimaryKey(TRUE);
                $this->setIsNewRecord(true);
                foreach ($this->getAttributes(null, static::primaryKey()) as $key =>$vakue){
                    $attributes[] = $key;
                }
            }
            else{
                $this->$versionDateColumn = trim($this->$versionDateColumn) ? date('d.m.Y H:i:s', strtotime($this->$versionDateColumn)) : date('d.m.Y H:i:s');
            }

            parent::updateAll([$isActualColumn => 0], $this->getDeleteCriteria());
        } else {
            return $this->delete();
        }
        return parent::save($runValidation, $attributes);
    }
    
    public function afterSave($insert = true, $changedAttributes = []) {
        $keyColumn = $this->_keyColumn;
        if ($this->$keyColumn == 0) {
            
            $this->updateAttributes([$keyColumn => $this->primaryKey]);
            $this->$keyColumn = $this->primaryKey;
        }
        parent::afterSave($insert, $changedAttributes);
    }

    public function setSubKeyColumn($value) {
		$subKeyColumn = $this->_subKeyColumn;
		$this->$subKeyColumn = $value;
    }
    
    public function getActuality() {
		$actualityColumn = $this->_actualityColumn;
		return $this->$actualityColumn;
    }
    
    public function setActuality($actuality) {
		$actualityColumn = $this->_actualityColumn;
		$this->$actualityColumn = $actuality;
    }
    
    public static function resetActuality($array) {
		foreach($array as $item) {
			$item->setActuality(0);
		}
    }
    
    public function getVersionedFields() {
        return [$this->_keyColumn,
				$this->_subKeyColumn,
				$this->_versionDateColumn,
				$this->_actualityColumn,
				$this->_deletedDateColumn];
    }
    
    public function createOldAttributes() {
		$attrs = $this->getAttributes();
		unset($attrs[$this->_versionDateColumn]);
		unset($attrs[$this->_deletedDateColumn]);
		unset($attrs[static::primaryKey()[0]]);
		$this->setOldAttributes($attrs);
    }
    
    public function getHints(){
        return [
            $this->_actualityColumn=>'Флаг актуальности данной модели', 
            $this->_keyColumn=>'Первичный ключ версионной модели',
            $this->_subKeyColumn=>'Вторичный ключ версионной модели',
            $this->_deletedDateColumn=>'Дата удаления',
            $this->_versionDateColumn=>'Дата изменения',
        ];
    }
}
?>