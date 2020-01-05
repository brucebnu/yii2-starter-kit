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
use backend\modules\org\models\UserToOrg as UserToOrgModel;

/**
 * UserToOrg represents the model behind the search form about `\backend\modules\org\models\UserToOrg`.
 */
class UserToOrg extends UserToOrgModel
{

	/**
	 *
	 * @inheritdoc
	 * @return unknown
	 */
	public function rules() {
		return [
			[['user_to_ort_id', 'org_id', 'user_id', 'updated_at', 'created_at'], 'integer'],
			[['org_title', 'role_name', 'status'], 'safe'],
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
		$query = UserToOrgModel::find();

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
				'user_to_ort_id' => $this->user_to_ort_id,
				'org_id' => $this->org_id,
				'user_id' => $this->user_id,
				'updated_at' => $this->updated_at,
				'created_at' => $this->created_at,
			]);

		$query->andFilterWhere(['like', 'org_title', $this->org_title])
		->andFilterWhere(['like', 'role_name', $this->role_name])
		->andFilterWhere(['like', 'status', $this->status]);

		return $dataProvider;
	}


}
