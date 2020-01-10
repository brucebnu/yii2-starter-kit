<?php

namespace backend\modules\org\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\org\models\OrderAmount;

/**
* OrderAmountSearch represents the model behind the search form about `\backend\modules\org\models\OrderAmount`.
*/
class OrderAmountSearch extends OrderAmount
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['amount_id', 'order_id', 'created_at', 'update_at', 'created_by', 'update_by'], 'integer'],
            [['transaction_price'], 'number'],
            [['currency_type', 'amount_type', 'payment_type', 'pay_order_src'], 'safe'],
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
$query = OrderAmount::find();

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
            'amount_id' => $this->amount_id,
            'order_id' => $this->order_id,
            'transaction_price' => $this->transaction_price,
            'created_at' => $this->created_at,
            'update_at' => $this->update_at,
            'created_by' => $this->created_by,
            'update_by' => $this->update_by,
        ]);

        $query->andFilterWhere(['like', 'currency_type', $this->currency_type])
            ->andFilterWhere(['like', 'amount_type', $this->amount_type])
            ->andFilterWhere(['like', 'payment_type', $this->payment_type])
            ->andFilterWhere(['like', 'pay_order_src', $this->pay_order_src]);

return $dataProvider;
}
}