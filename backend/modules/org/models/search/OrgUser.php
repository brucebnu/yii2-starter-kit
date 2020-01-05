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
use backend\modules\org\models\OrgUser as OrgUserModel;

/**
 * OrgUser represents the model behind the search form about `\backend\modules\org\models\OrgUser`.
 */
class OrgUser extends OrgUserModel
{

	/**
	 *
	 * @inheritdoc
	 * @return unknown
	 */
	public function rules() {
		return [
			[['user_id', 'phone', 'phone_native', 'created_at', 'updated_at'], 'integer'],
			[['passport_no', 'nationality', 'passport_full_Name', 'full_name', 'nick_name', 'gender', 'birthday', 'passport_src', 'emergency_contact', 'phone_calling_code', 'phone_native_calling_code', 'linked_training', 'company_type', 'company_title'], 'safe'],
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
		$query = OrgUserModel::find();

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
				'birthday' => $this->birthday,
				'phone' => $this->phone,
				'phone_native' => $this->phone_native,
				'created_at' => $this->created_at,
				'updated_at' => $this->updated_at,
			]);

		$query->andFilterWhere(['like', 'passport_no', $this->passport_no])
		->andFilterWhere(['like', 'nationality', $this->nationality])
		->andFilterWhere(['like', 'passport_full_Name', $this->passport_full_Name])
		->andFilterWhere(['like', 'full_name', $this->full_name])
		->andFilterWhere(['like', 'nick_name', $this->nick_name])
		->andFilterWhere(['like', 'gender', $this->gender])
		->andFilterWhere(['like', 'passport_src', $this->passport_src])
		->andFilterWhere(['like', 'emergency_contact', $this->emergency_contact])
		->andFilterWhere(['like', 'phone_calling_code', $this->phone_calling_code])
		->andFilterWhere(['like', 'phone_native_calling_code', $this->phone_native_calling_code])
		->andFilterWhere(['like', 'linked_training', $this->linked_training])
		->andFilterWhere(['like', 'company_type', $this->company_type])
		->andFilterWhere(['like', 'company_title', $this->company_title]);

		return $dataProvider;
	}


}
