<?php
namespace app\models;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class ArticlesSearch extends Articles
{
    public $search;
    public $category;

    public function rules()
    {
        return [
            [['search', 'category'], 'safe'],
        ];
    }


    public function search($params)
    {
        $query = Articles::find()->orderBy(['created_at' => SORT_DESC]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->JoinWith(['user', 'category', 'marks']);

        if(!empty($this->search) || !empty($this->category)){
            $query->andFilterWhere(['like', 'articles.title', $this->search])
                ->orFilterWhere(['like', 'short_description', $this->search])
                ->orFilterWhere(['like', 'description', $this->search])
                ->orFilterWhere(['like', 'marks.name', $this->search])
                ->orWhere(['category_id' => $this->category]);
        }

        return $dataProvider;
    }
}