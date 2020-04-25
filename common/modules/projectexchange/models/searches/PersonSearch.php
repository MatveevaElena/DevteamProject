<?php

namespace common\modules\projectexchange\models\searches;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\projectexchange\models\Person;

/**
 * PersonSearch represents the model behind the search form of `common\modules\projectexchange\models\Person`.
 */
class PersonSearch extends Person
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'ParentID', 'IsActual'], 'integer'],
            [['LastName', 'FirstName', 'MiddleName', 'BirthDate', 'VersionDate', 'DeletedDate'], 'safe'],
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
        $query = Person::find();

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
            'BirthDate' => $this->BirthDate,
            'ParentID' => $this->ParentID,
            'IsActual' => $this->IsActual,
            'VersionDate' => $this->VersionDate,
            'DeletedDate' => $this->DeletedDate,
        ]);

        $query->andFilterWhere(['like', 'LastName', $this->LastName])
            ->andFilterWhere(['like', 'FirstName', $this->FirstName])
            ->andFilterWhere(['like', 'MiddleName', $this->MiddleName]);

        return $dataProvider;
    }
}
