<?php

namespace backend\modules\org\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\org\models\UserToAgency;

/**
* UserToAgencySearch represents the model behind the search form about `\backend\modules\org\models\UserToAgency`.
*/
class UserToAgencySearch extends UserToAgency
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['user_to_agency', 'user_id'], 'integer'],
            [['agency_name', 'agency_contact'], 'safe'],
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
$query = UserToAgency::find();

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
            'user_to_agency' => $this->user_to_agency,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'agency_name', $this->agency_name])
            ->andFilterWhere(['like', 'agency_contact', $this->agency_contact]);

return $dataProvider;
}
}