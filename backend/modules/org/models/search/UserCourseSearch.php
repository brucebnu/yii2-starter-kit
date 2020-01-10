<?php

namespace backend\modules\org\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\org\models\UserCourse;

/**
* UserCourseSearch represents the model behind the search form about `\backend\modules\org\models\UserCourse`.
*/
class UserCourseSearch extends UserCourse
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['user_org_course_id', 'org_id', 'user_id', 'course_id', 'started_at', 'ended_at'], 'integer'],
            [['period_week'], 'safe'],
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
$query = UserCourse::find();

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
            'user_org_course_id' => $this->user_org_course_id,
            'org_id' => $this->org_id,
            'user_id' => $this->user_id,
            'course_id' => $this->course_id,
            'started_at' => $this->started_at,
            'ended_at' => $this->ended_at,
        ]);

        $query->andFilterWhere(['like', 'period_week', $this->period_week]);

return $dataProvider;
}
}