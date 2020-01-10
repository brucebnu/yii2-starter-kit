<?php

namespace backend\modules\org\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\org\models\UserToOrg;

/**
* UserToOrgSearch represents the model behind the search form about `\backend\modules\org\models\UserToOrg`.
*/
class UserToOrgSearch extends UserToOrg
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['user_to_ort_id', 'org_id', 'user_id', 'updated_at', 'created_at'], 'integer'],
            [['org_title', 'role_name', 'status'], 'safe'],
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
$query = UserToOrg::find();

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
            'user_to_ort_id' => $this->user_to_ort_id,
            'org_id' => $this->org_id,
            'user_id' => $this->user_id,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'org_title', $this->org_title])
            ->andFilterWhere(['like', 'role_name', $this->role_name])
            ->andFilterWhere(['like', 'status', $this->status]);

return $dataProvider;
}
}