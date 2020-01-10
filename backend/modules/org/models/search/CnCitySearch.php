<?php

namespace backend\modules\org\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\org\models\CnCity;

/**
* CnCitySearch represents the model behind the search form about `\backend\modules\org\models\CnCity`.
*/
class CnCitySearch extends CnCity
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['city_id', 'province_id'], 'integer'],
            [['city_name', 'first_letter'], 'safe'],
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
$query = CnCity::find();

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
            'city_id' => $this->city_id,
            'province_id' => $this->province_id,
        ]);

        $query->andFilterWhere(['like', 'city_name', $this->city_name])
            ->andFilterWhere(['like', 'first_letter', $this->first_letter]);

return $dataProvider;
}
}