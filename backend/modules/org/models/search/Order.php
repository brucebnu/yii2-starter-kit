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
use backend\modules\org\models\Order as OrderModel;

/**
 * Order represents the model behind the search form about `\backend\modules\org\models\Order`.
 */
class Order extends OrderModel
{

	/**
	 *
	 * @inheritdoc
	 * @return unknown
	 */
	public function rules() {
		return [
			[['order_id', 'org_id', 'user_id', 'created_by', 'updated_at', 'created_at'], 'integer'],
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
		$query = OrderModel::find();

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
				'created_by' => $this->created_by,
				'updated_at' => $this->updated_at,
				'created_at' => $this->created_at,
			]);

		return $dataProvider;
	}


}
