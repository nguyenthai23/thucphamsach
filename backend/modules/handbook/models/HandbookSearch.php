<?php

namespace backend\modules\handbook\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\handbook\models\Handbook;

/**
 * HandbookSearch represents the model behind the search form about `backend\modules\handbook\models\Handbook`.
 */
class HandbookSearch extends Handbook
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'create_time', 'create_by', 'update_time', 'update_by'], 'integer'],
            [['title', 'content', 'image'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Handbook::find();

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
            'create_time' => $this->create_time,
            'create_by' => $this->create_by,
            'update_time' => $this->update_time,
            'update_by' => $this->update_by,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }
}
