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
use backend\modules\crud\models\User as UserModel;

/**
 * User represents the model behind the search form about `\backend\modules\crud\models\User`.
 */
class User extends UserModel
{

	/**
	 *
	 * @inheritdoc
	 * @return unknown
	 */
	public function rules() {
		return [
			[['id', 'status', 'created_at', 'updated_at', 'logged_at'], 'integer'],
			[['username', 'auth_key', 'access_token', 'password_hash', 'oauth_client', 'oauth_client_user_id', 'email'], 'safe'],
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
		$query = UserModel::find();

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
				'id' => $this->id,
				'status' => $this->status,
				'created_at' => $this->created_at,
				'updated_at' => $this->updated_at,
				'logged_at' => $this->logged_at,
			]);

		$query->andFilterWhere(['like', 'username', $this->username])
		->andFilterWhere(['like', 'auth_key', $this->auth_key])
		->andFilterWhere(['like', 'access_token', $this->access_token])
		->andFilterWhere(['like', 'password_hash', $this->password_hash])
		->andFilterWhere(['like', 'oauth_client', $this->oauth_client])
		->andFilterWhere(['like', 'oauth_client_user_id', $this->oauth_client_user_id])
		->andFilterWhere(['like', 'email', $this->email]);

		return $dataProvider;
	}


}
