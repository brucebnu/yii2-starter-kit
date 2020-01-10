<?php

namespace backend\modules\org\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\org\models\UserOrg;

/**
* UserOrgSearch represents the model behind the search form about `\backend\modules\org\models\UserOrg`.
*/
class UserOrgSearch extends UserOrg
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['user_id', 'phone', 'phone_native', 'created_at', 'updated_at'], 'integer'],
            [['passport_no', 'nationality', 'passport_full_Name', 'full_name', 'nick_name', 'gender', 'birthday', 'emergency_contact', 'phone_calling_code', 'phone_native_calling_code', 'linked_training', 'company_type', 'company_title', 'passport_info'], 'safe'],
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
$query = UserOrg::find();

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
            'user_id' => $this->user_id,
            'birthday' => $this->birthday,
            'phone' => $this->phone,
            'phone_native' => $this->phone_native,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'passport_no', $this->passport_no])
            ->andFilterWhere(['like', 'nationality', $this->nationality])
            ->andFilterWhere(['like', 'passport_full_Name', $this->passport_full_Name])
            ->andFilterWhere(['like', 'full_name', $this->full_name])
            ->andFilterWhere(['like', 'nick_name', $this->nick_name])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'emergency_contact', $this->emergency_contact])
            ->andFilterWhere(['like', 'phone_calling_code', $this->phone_calling_code])
            ->andFilterWhere(['like', 'phone_native_calling_code', $this->phone_native_calling_code])
            ->andFilterWhere(['like', 'linked_training', $this->linked_training])
            ->andFilterWhere(['like', 'company_type', $this->company_type])
            ->andFilterWhere(['like', 'company_title', $this->company_title])
            ->andFilterWhere(['like', 'passport_info', $this->passport_info]);

return $dataProvider;
}
}