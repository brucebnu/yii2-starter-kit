<?php

namespace backend\modules\org\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\org\models\CnProvince as CnProvinceModel;

/**
* CnProvince represents the model behind the search form about `\backend\modules\org\models\CnProvince`.
*/
class CnProvince extends CnProvinceModel
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['province_id'], 'integer'],
            [['province_name'], 'safe'],
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
$query = CnProvinceModel::find();

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
            'province_id' => $this->province_id,
        ]);

        $query->andFilterWhere(['like', 'province_name', $this->province_name]);

return $dataProvider;
}
}