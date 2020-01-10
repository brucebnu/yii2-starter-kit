<?php

namespace backend\modules\org\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\org\models\Course;

/**
* CourseSearch represents the model behind the search form about `\backend\modules\org\models\Course`.
*/
class CourseSearch extends Course
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['course_id', 'org_id'], 'integer'],
            [['regulation', 'title', 'descript'], 'safe'],
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
$query = Course::find();

$dataProvider = new ActiveDataProvider([
'query' => $query,
]);

$this->load($params);

if (!$this->validate()) {
// uncomment the following line if you do not want to any records when validation fails
// $query->where('0=1');
return $dataProvider;
}

$query->andFilterWhere([
            'course_id' => $this->course_id,
            'org_id' => $this->org_id,
        ]);

        $query->andFilterWhere(['like', 'regulation', $this->regulation])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'descript', $this->descript]);

return $dataProvider;
}
}