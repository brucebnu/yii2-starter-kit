<?php
/**
 * /Users/brucebnu/Programming/backend/github/yii2-starter-kit/console/runtime/giiant/e0080b9d6ffa35acb85312bf99a557f2
 *
 * @package default
 */


namespace backend\modules\org\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\org\models\UserExpress as UserExpressModel;

/**
 * UserExpress represents the model behind the search form about `\backend\modules\org\models\UserExpress`.
 */
class UserExpress extends UserExpressModel
{

	/**
	 *
	 * @inheritdoc
	 * @return unknown
	 */
	public function rules() {
		return [
			[['express_id', 'user_id', 'user_address_id', 'completion_time', 'updated_at', 'created_at'], 'integer'],
			[['express_title', 'express_no', 'express_info_url', 'express_type'], 'safe'],
		];
	}


	/**
	 *
	 * @inheritdoc
	 * @return unknown
	 */
	public function scenarios() {
		// bypass scenarios() implementation in the parent class
		return Model::scenarios();
	}


	/**
	 * Creates data provider instance with search query applied
	 *
	 *
	 * @param array   $params
	 * @return ActiveDataProvider
	 */
	public function search($params) {
		$query = UserExpressModel::find();

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
				'express_id' => $this->express_id,
				'user_id' => $this->user_id,
				'user_address_id' => $this->user_address_id,
				'completion_time' => $this->completion_time,
				'updated_at' => $this->updated_at,
				'created_at' => $this->created_at,
			]);

		$query->andFilterWhere(['like', 'express_title', $this->express_title])
		->andFilterWhere(['like', 'express_no', $this->express_no])
		->andFilterWhere(['like', 'express_info_url', $this->express_info_url])
		->andFilterWhere(['like', 'express_type', $this->express_type]);

		return $dataProvider;
	}


}
