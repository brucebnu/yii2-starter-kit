<?php

namespace backend\modules\org\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\org\models\CnZipcode;

/**
* CnZipcodeSearch represents the model behind the search form about `\backend\modules\org\models\CnZipcode`.
*/
class CnZipcodeSearch extends CnZipcode
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['zip_id', 'region_id'], 'integer'],
            [['zip_number', 'code'], 'safe'],
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
$query = CnZipcode::find();

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
            'zip_id' => $this->zip_id,
            'region_id' => $this->region_id,
        ]);

        $query->andFilterWhere(['like', 'zip_number', $this->zip_number])
            ->andFilterWhere(['like', 'code', $this->code]);

return $dataProvider;
}
}