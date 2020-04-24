<?php

namespace common\modules\projectexchange\models\searches;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\projectexchange\models\Project;

/**
 * ProjectSearch represents the model behind the search form of `common\modules\projectexchange\models\Project`.
 */
class ProjectSearch extends Project
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'PersonCount', 'ParentID', 'IsActual', 'TypeID', 'StatusID', 'RequestParentID', 'TeamID'], 'integer'],
            [['BeginDate', 'EndDate', 'Name', 'VersionDate', 'DeleteDate'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Project::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'ID' => $this->ID,
            'BeginDate' => $this->BeginDate,
            'EndDate' => $this->EndDate,
            'PersonCount' => $this->PersonCount,
            'ParentID' => $this->ParentID,
            'IsActual' => $this->IsActual,
            'VersionDate' => $this->VersionDate,
            'DeleteDate' => $this->DeleteDate,
            'TypeID' => $this->TypeID,
            'StatusID' => $this->StatusID,
            'RequestParentID' => $this->RequestParentID,
            'TeamID' => $this->TeamID,
        ]);

        $query->andFilterWhere(['like', 'Name', $this->Name]);

        return $dataProvider;
    }
}
