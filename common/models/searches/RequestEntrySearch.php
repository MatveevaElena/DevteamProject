<?php

namespace common\models\searches;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\RequestEntry;

/**
 * RequestEntrySearch represents the model behind the search form of `common\models\RequestEntry`.
 */
class RequestEntrySearch extends RequestEntry
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'ParentID', 'IsActual', 'StoredFileID', 'ProjectParentID', 'StatusID', 'PersonParentID'], 'integer'],
            [['RequestDate', 'Experience', 'Target', 'VersionDate', 'DeleteDate', 'request_entrycol'], 'safe'],
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
        $query = RequestEntry::find();

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
            'RequestDate' => $this->RequestDate,
            'ParentID' => $this->ParentID,
            'IsActual' => $this->IsActual,
            'VersionDate' => $this->VersionDate,
            'DeleteDate' => $this->DeleteDate,
            'StoredFileID' => $this->StoredFileID,
            'ProjectParentID' => $this->ProjectParentID,
            'StatusID' => $this->StatusID,
            'PersonParentID' => $this->PersonParentID,
        ]);

        $query->andFilterWhere(['like', 'Experience', $this->Experience])
            ->andFilterWhere(['like', 'Target', $this->Target])
            ->andFilterWhere(['like', 'request_entrycol', $this->request_entrycol]);

        return $dataProvider;
    }
}
