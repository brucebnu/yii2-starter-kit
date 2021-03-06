<?php

namespace backend\modules\org\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\org\models\CnRegion;

/**
* CnRegionSearch represents the model behind the search form about `\backend\modules\org\models\CnRegion`.
*/
class CnRegionSearch extends CnRegion
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['region_id', 'city_id'], 'integer'],
            [['region_name'], 'safe'],
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
$query = CnRegion::find();

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
            'region_id' => $this->region_id,
            'city_id' => $this->city_id,
        ]);

        $query->andFilterWhere(['like', 'region_name', $this->region_name]);

return $dataProvider;
}
}