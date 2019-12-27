<?php
/**
 * /Users/brucebnu/Programming/backend/github/yii2-starter-kit/console/runtime/giiant/e0080b9d6ffa35acb85312bf99a557f2
 *
 * @package default
 */


namespace backend\modules\crud\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\crud\models\UserProfile as UserProfileModel;

/**
 * UserProfile represents the model behind the search form about `\backend\modules\crud\models\UserProfile`.
 */
class UserProfile extends UserProfileModel
{

	/**
	 *
	 * @inheritdoc
	 * @return unknown
	 */
	public function rules() {
		return [
			[['user_id', 'gender'], 'integer'],
			[['firstname', 'middlename', 'lastname', 'avatar_path', 'avatar_base_url', 'locale'], 'safe'],
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
		$query = UserProfileModel::find();

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
				'user_id' => $this->user_id,
				'gender' => $this->gender,
			]);

		$query->andFilterWhere(['like', 'firstname', $this->firstname])
		->andFilterWhere(['like', 'middlename', $this->middlename])
		->andFilterWhere(['like', 'lastname', $this->lastname])
		->andFilterWhere(['like', 'avatar_path', $this->avatar_path])
		->andFilterWhere(['like', 'avatar_base_url', $this->avatar_base_url])
		->andFilterWhere(['like', 'locale', $this->locale]);

		return $dataProvider;
	}


}
