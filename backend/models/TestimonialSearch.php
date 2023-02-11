<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Testimonial;

/**
 * TestimonialSearch represents the model behind the search form of `common\models\Testimonial`.
 */
class TestimonialSearch extends Testimonial
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'project_id', 'customer_image_id', 'rating'], 'integer'],
            [['title', 'customer_name', 'review'], 'safe'],
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
        $query = Testimonial::find();

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
            'id' => $this->id,
            'project_id' => $this->project_id,
            'customer_image_id' => $this->customer_image_id,
            'rating' => $this->rating,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'customer_name', $this->customer_name])
            ->andFilterWhere(['like', 'review', $this->review]);

        return $dataProvider;
    }
}
