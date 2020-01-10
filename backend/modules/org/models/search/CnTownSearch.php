<?php

namespace backend\modules\org\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\org\models\CnTown;

/**
* CnTownSearch represents the model behind the search form about `\backend\modules\org\models\CnTown`.
*/
class CnTownSearch extends CnTown
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['town_id', 'region_id'], 'integer'],
            [['town_name'], 'safe'],
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
$query = CnTown::find();

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
            'town_id' => $this->town_id,
            'region_id' => $this->region_id,
        ]);

        $query->andFilterWhere(['like', 'town_name', $this->town_name]);

return $dataProvider;
}
}