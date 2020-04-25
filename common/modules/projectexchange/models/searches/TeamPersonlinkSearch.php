<?php

namespace common\modules\projectexchange\models\searches;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\projectexchange\models\TeamPersonlink;

/**
 * TeamPersonlinkSearch represents the model behind the search form of `common\modules\projectexchange\models\TeamPersonlink`.
 */
class TeamPersonlinkSearch extends TeamPersonlink
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'IsActual', 'RoleID', 'TeamID', 'StatusID', 'PersonParentID'], 'integer'],
            [['ParentID', 'VersionDate', 'DeletedDate'], 'safe'],
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
        $query = TeamPersonlink::find();

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
            'IsActual' => $this->IsActual,
            'VersionDate' => $this->VersionDate,
            'DeletedDate' => $this->DeletedDate,
            'RoleID' => $this->RoleID,
            'TeamID' => $this->TeamID,
            'StatusID' => $this->StatusID,
            'PersonParentID' => $this->PersonParentID,
        ]);

        $query->andFilterWhere(['like', 'ParentID', $this->ParentID]);

        return $dataProvider;
    }
}
