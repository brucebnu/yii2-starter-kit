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
use backend\modules\org\models\Course as CourseModel;

/**
 * Course represents the model behind the search form about `\backend\modules\org\models\Course`.
 */
class Course extends CourseModel
{

	/**
	 *
	 * @inheritdoc
	 * @return unknown
	 */
	public function rules() {
		return [
			[['course_id', 'org_id'], 'integer'],
			[['regulation', 'title', 'descript'], 'safe'],
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
		$query = CourseModel::find();

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
				'course_id' => $this->course_id,
				'org_id' => $this->org_id,
			]);

		$query->andFilterWhere(['like', 'regulation', $this->regulation])
		->andFilterWhere(['like', 'title', $this->title])
		->andFilterWhere(['like', 'descript', $this->descript]);

		return $dataProvider;
	}


}
