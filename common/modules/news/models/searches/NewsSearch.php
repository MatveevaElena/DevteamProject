<?php

namespace common\modules\news\models\searches;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\news\models\News;

/**
 * NewsSearch represents the model behind the search form of `\common\modules\news\models\News`.
 */
class NewsSearch extends News
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'ImgID', 'Views'], 'integer'],
            [['Date', 'Authors', 'Title', 'Description', 'Main'], 'safe'],
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
        $query = News::find();

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
            'Date' => $this->Date,
            'ImgID' => $this->ImgID,
            'Views' => $this->Views,
        ]);

        $query->andFilterWhere(['like', 'Authors', $this->Authors])
            ->andFilterWhere(['like', 'Title', $this->Title])
            ->andFilterWhere(['like', 'Description', $this->Description])
            ->andFilterWhere(['like', 'Main', $this->Main]);

        return $dataProvider;
    }
}
