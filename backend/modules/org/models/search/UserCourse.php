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
use backend\modules\org\models\UserCourse as UserCourseModel;

/**
 * UserCourse represents the model behind the search form about `\backend\modules\org\models\UserCourse`.
 */
class UserCourse extends UserCourseModel
{

	/**
	 *
	 * @inheritdoc
	 * @return unknown
	 */
	public function rules() {
		return [
			[['org_user_course_id', 'org_id', 'user_id', 'course_id', 'started_at', 'ended_at'], 'integer'],
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
		$query = UserCourseModel::find();

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
				'org_user_course_id' => $this->org_user_course_id,
				'org_id' => $this->org_id,
				'user_id' => $this->user_id,
				'course_id' => $this->course_id,
				'started_at' => $this->started_at,
				'ended_at' => $this->ended_at,
			]);

		$query->andFilterWhere(['like', 'period_week', $this->period_week]);

		return $dataProvider;
	}


}
