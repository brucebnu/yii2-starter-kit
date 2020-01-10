<?php

namespace backend\modules\org\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\org\models\Order;

/**
* OrderSearch represents the model behind the search form about `\backend\modules\org\models\Order`.
*/
class OrderSearch extends Order
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['order_id', 'org_id', 'user_id', 'updated_at', 'created_at', 'created_by', 'updated_by'], 'integer'],
            [['total_price'], 'number'],
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
$query = Order::find();

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
            'order_id' => $this->order_id,
            'org_id' => $this->org_id,
            'user_id' => $this->user_id,
            'total_price' => $this->total_price,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

return $dataProvider;
}
}