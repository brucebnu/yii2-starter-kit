<?php

namespace backend\modules\org\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\org\models\Organization;

/**
* OrganizationSearch represents the model behind the search form about `\backend\modules\org\models\Organization`.
*/
class OrganizationSearch extends Organization
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['org_id', 'org_parent_id', 'created_id', 'sort', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['title', 'home_site', 'country', 'address', 'inland_phone', 'foreign_phone', 'email', 'status', 'school_logo_src'], 'safe'],
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
$query = Organization::find();

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
            'org_id' => $this->org_id,
            'org_parent_id' => $this->org_parent_id,
            'created_id' => $this->created_id,
            'sort' => $this->sort,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'home_site', $this->home_site])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'inland_phone', $this->inland_phone])
            ->andFilterWhere(['like', 'foreign_phone', $this->foreign_phone])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'school_logo_src', $this->school_logo_src]);

return $dataProvider;
}
}