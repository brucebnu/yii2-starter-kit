<?php

namespace backend\modules\org\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\org\models\UserFileStorage;

/**
* UserFileStorageSearch represents the model behind the search form about `\backend\modules\org\models\UserFileStorage`.
*/
class UserFileStorageSearch extends UserFileStorage
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['user_file_storage_id', 'user_id', 'size', 'status', 'created_at', 'created_by'], 'integer'],
            [['component', 'base_url', 'path', 'type', 'name', 'upload_ip', 'hash', 'area', 'bucket'], 'safe'],
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
$query = UserFileStorage::find();

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
            'user_file_storage_id' => $this->user_file_storage_id,
            'user_id' => $this->user_id,
            'size' => $this->size,
            'status' => $this->status,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
        ]);

        $query->andFilterWhere(['like', 'component', $this->component])
            ->andFilterWhere(['like', 'base_url', $this->base_url])
            ->andFilterWhere(['like', 'path', $this->path])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'upload_ip', $this->upload_ip])
            ->andFilterWhere(['like', 'hash', $this->hash])
            ->andFilterWhere(['like', 'area', $this->area])
            ->andFilterWhere(['like', 'bucket', $this->bucket]);

return $dataProvider;
}
}