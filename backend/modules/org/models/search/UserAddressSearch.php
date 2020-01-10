<?php

namespace backend\modules\org\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\org\models\UserAddress;

/**
* UserAddressSearch represents the model behind the search form about `\backend\modules\org\models\UserAddress`.
*/
class UserAddressSearch extends UserAddress
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['user_address_id', 'user_id', 'country', 'province', 'city', 'region', 'town', 'sort', 'created_at', 'updated_at'], 'integer'],
            [['detailed', 'consignee', 'gender', 'phone_number', 'email', 'alias', 'status'], 'safe'],
            [['longitude', 'latitude'], 'number'],
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
$query = UserAddress::find();

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
            'user_address_id' => $this->user_address_id,
            'user_id' => $this->user_id,
            'country' => $this->country,
            'province' => $this->province,
            'city' => $this->city,
            'region' => $this->region,
            'town' => $this->town,
            'sort' => $this->sort,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'detailed', $this->detailed])
            ->andFilterWhere(['like', 'consignee', $this->consignee])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'phone_number', $this->phone_number])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'alias', $this->alias])
            ->andFilterWhere(['like', 'status', $this->status]);

return $dataProvider;
}
}