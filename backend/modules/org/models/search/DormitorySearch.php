<?php

namespace backend\modules\org\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\org\models\Dormitory;

/**
* DormitorySearch represents the model behind the search form about `\backend\modules\org\models\Dormitory`.
*/
class DormitorySearch extends Dormitory
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['dormitory_id', 'org_id', 'started_at', 'ended_at'], 'integer'],
            [['dormitory_type', 'period_week'], 'safe'],
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
$query = Dormitory::find();

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
            'dormitory_id' => $this->dormitory_id,
            'org_id' => $this->org_id,
            'started_at' => $this->started_at,
            'ended_at' => $this->ended_at,
        ]);

        $query->andFilterWhere(['like', 'dormitory_type', $this->dormitory_type])
            ->andFilterWhere(['like', 'period_week', $this->period_week]);

return $dataProvider;
}
}