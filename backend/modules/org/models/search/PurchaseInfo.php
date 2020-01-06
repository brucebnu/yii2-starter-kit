<?php

namespace backend\modules\org\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\org\models\PurchaseInfo as PurchaseInfoModel;

/**
* PurchaseInfo represents the model behind the search form about `\backend\modules\org\models\PurchaseInfo`.
*/
class PurchaseInfo extends PurchaseInfoModel
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['purchase_invoice_id', 'org_id', 'updated_at', 'created_at', 'updated_by', 'created_by'], 'integer'],
            [['pubchase_tag', 'pubchase_invoice_src'], 'safe'],
            [['pubchase_invoice_price'], 'number'],
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
$query = PurchaseInfoModel::find();

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
            'purchase_invoice_id' => $this->purchase_invoice_id,
            'pubchase_invoice_price' => $this->pubchase_invoice_price,
            'org_id' => $this->org_id,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
            'updated_by' => $this->updated_by,
            'created_by' => $this->created_by,
        ]);

        $query->andFilterWhere(['like', 'pubchase_tag', $this->pubchase_tag])
            ->andFilterWhere(['like', 'pubchase_invoice_src', $this->pubchase_invoice_src]);

return $dataProvider;
}
}