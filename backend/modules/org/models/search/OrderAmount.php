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
use backend\modules\org\models\OrderAmount as OrderAmountModel;

/**
 * OrderAmount represents the model behind the search form about `\backend\modules\org\models\OrderAmount`.
 */
class OrderAmount extends OrderAmountModel
{

	/**
	 *
	 * @inheritdoc
	 * @return unknown
	 */
	public function rules() {
		return [
			[['amount_id', 'order_id', 'created_at', 'update_at'], 'integer'],
			[['currency_type', 'payment_type', 'pay_order_src'], 'safe'],
			[['transaction_price'], 'number'],
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
		$query = OrderAmountModel::find();

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
			]);

		$query->andFilterWhere(['like', 'currency_type', $this->currency_type])
		->andFilterWhere(['like', 'payment_type', $this->payment_type])
		->andFilterWhere(['like', 'pay_order_src', $this->pay_order_src]);

		return $dataProvider;
	}


}
