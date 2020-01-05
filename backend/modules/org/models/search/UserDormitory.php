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
use backend\modules\org\models\UserDormitory as UserDormitoryModel;

/**
 * UserDormitory represents the model behind the search form about `\backend\modules\org\models\UserDormitory`.
 */
class UserDormitory extends UserDormitoryModel
{

	/**
	 *
	 * @inheritdoc
	 * @return unknown
	 */
	public function rules() {
		return [
			[['user_dormitory_id', 'org_id', 'user_id', 'dormitory_id', 'started_at', 'ended_at', 'created_at', 'updated_at'], 'integer'],
			[['period_week'], 'safe'],
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
		$query = UserDormitoryModel::find();

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
				'user_dormitory_id' => $this->user_dormitory_id,
				'org_id' => $this->org_id,
				'user_id' => $this->user_id,
				'dormitory_id' => $this->dormitory_id,
				'started_at' => $this->started_at,
				'ended_at' => $this->ended_at,
				'created_at' => $this->created_at,
				'updated_at' => $this->updated_at,
			]);

		$query->andFilterWhere(['like', 'period_week', $this->period_week]);

		return $dataProvider;
	}


}
