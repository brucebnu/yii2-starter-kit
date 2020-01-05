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
use backend\modules\org\models\UserFlight as UserFlightModel;

/**
 * UserFlight represents the model behind the search form about `\backend\modules\org\models\UserFlight`.
 */
class UserFlight extends UserFlightModel
{

	/**
	 *
	 * @inheritdoc
	 * @return unknown
	 */
	public function rules() {
		return [
			[['org_user_flight_id', 'user_id', 'org_id'], 'integer'],
			[['arrival_flight', 'arrival_datetime', 'departure_flight', 'departure_datetime', 'pickup_special_request', 'visa_expiry_date', 'travel_insurance', 'address'], 'safe'],
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
		$query = UserFlightModel::find();

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
				'org_user_flight_id' => $this->org_user_flight_id,
				'user_id' => $this->user_id,
				'org_id' => $this->org_id,
				'arrival_datetime' => $this->arrival_datetime,
				'departure_datetime' => $this->departure_datetime,
				'visa_expiry_date' => $this->visa_expiry_date,
			]);

		$query->andFilterWhere(['like', 'arrival_flight', $this->arrival_flight])
		->andFilterWhere(['like', 'departure_flight', $this->departure_flight])
		->andFilterWhere(['like', 'pickup_special_request', $this->pickup_special_request])
		->andFilterWhere(['like', 'travel_insurance', $this->travel_insurance])
		->andFilterWhere(['like', 'address', $this->address]);

		return $dataProvider;
	}


}
