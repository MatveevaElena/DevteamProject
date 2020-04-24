<?php

namespace common\modules\projectexchange\models\searches;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\projectexchange\models\Request;

/**
 * RequestSearch represents the model behind the search form of `common\modules\projectexchange\models\Request`.
 */
class RequestSearch extends Request
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'PersonCount', 'TZ', 'ParentID', 'IsActual', 'StatusID', 'TypeID', 'PersonParentID'], 'integer'],
            [['Tasks', 'Objective', 'Issue', 'ProductResults', 'Cost', 'RequestDate', 'VersionDate', 'DeleteDate'], 'safe'],
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
        $query = Request::find();

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
            'PersonCount' => $this->PersonCount,
            'TZ' => $this->TZ,
            'RequestDate' => $this->RequestDate,
            'ParentID' => $this->ParentID,
            'IsActual' => $this->IsActual,
            'VersionDate' => $this->VersionDate,
            'DeleteDate' => $this->DeleteDate,
            'StatusID' => $this->StatusID,
            'TypeID' => $this->TypeID,
            'PersonParentID' => $this->PersonParentID,
        ]);

        $query->andFilterWhere(['like', 'Tasks', $this->Tasks])
            ->andFilterWhere(['like', 'Objective', $this->Objective])
            ->andFilterWhere(['like', 'Issue', $this->Issue])
            ->andFilterWhere(['like', 'ProductResults', $this->ProductResults])
            ->andFilterWhere(['like', 'Cost', $this->Cost]);

        return $dataProvider;
    }
}
