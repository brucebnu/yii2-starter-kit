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
use backend\modules\org\models\UserToAgency as UserToAgencyModel;

/**
 * UserToAgency represents the model behind the search form about `\backend\modules\org\models\UserToAgency`.
 */
class UserToAgency extends UserToAgencyModel
{

	/**
	 *
	 * @inheritdoc
	 * @return unknown
	 */
	public function rules() {
		return [
			[['user_to_agency', 'user_id'], 'integer'],
			[['agency_name', 'agency_contact'], 'safe'],
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
		$query = UserToAgencyModel::find();

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
				'user_to_agency' => $this->user_to_agency,
				'user_id' => $this->user_id,
			]);

		$query->andFilterWhere(['like', 'agency_name', $this->agency_name])
		->andFilterWhere(['like', 'agency_contact', $this->agency_contact]);

		return $dataProvider;
	}


}
