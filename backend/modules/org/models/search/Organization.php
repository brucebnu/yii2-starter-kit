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
use backend\modules\org\models\Organization as OrganizationModel;

/**
 * Organization represents the model behind the search form about `\backend\modules\org\models\Organization`.
 */
class Organization extends OrganizationModel
{

	/**
	 *
	 * @inheritdoc
	 * @return unknown
	 */
	public function rules() {
		return [
			[['org_id', 'org_parent_id', 'created_id', 'sort', 'created_at', 'updated_at'], 'integer'],
			[['title', 'home_site', 'school_logo_src', 'country', 'address', 'inland_phone', 'foreign_phone', 'email', 'status'], 'safe'],
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
		$query = OrganizationModel::find();

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
				'org_id' => $this->org_id,
				'org_parent_id' => $this->org_parent_id,
				'created_id' => $this->created_id,
				'sort' => $this->sort,
				'created_at' => $this->created_at,
				'updated_at' => $this->updated_at,
			]);

		$query->andFilterWhere(['like', 'title', $this->title])
		->andFilterWhere(['like', 'home_site', $this->home_site])
		->andFilterWhere(['like', 'school_logo_src', $this->school_logo_src])
		->andFilterWhere(['like', 'country', $this->country])
		->andFilterWhere(['like', 'address', $this->address])
		->andFilterWhere(['like', 'inland_phone', $this->inland_phone])
		->andFilterWhere(['like', 'foreign_phone', $this->foreign_phone])
		->andFilterWhere(['like', 'email', $this->email])
		->andFilterWhere(['like', 'status', $this->status]);

		return $dataProvider;
	}


}
