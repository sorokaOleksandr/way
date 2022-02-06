<?php

namespace app\models;

use Yii;
use app\models\Locality;
use app\controllers\AnnouncementsController;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;

/**
 * AnnouncementSearch represents the model behind the search form of `app\models\Announcement`.
 */
class AnnouncementsSearch extends Announcement
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'category_id'], 'integer'],
            [['author', 'phone', 'city', 'name', 'description', 'img', 'date', 'status'], 'safe'],
            [['price'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     * @param array $params
     * @return ActiveDataProvider
     */
    public function search($id)
    {

        $query = Announcements::find()
            ->where(['category_id' => $id, 'status' => AnnouncementsController::STATUS_ACTIVE]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'date' => SORT_DESC,
                ]
            ],
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        $this->load($id);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'category_id' => $this->id,
            'date' => $this->date,
            'price' => $this->price,
            'name' => $this->name,
            'city' => $this->city
        ]);

        $query->andFilterWhere(['like', 'author', $this->author])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'img', $this->img])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }

    /**
     * фильтруем по городу
     */
    public static function getCityList()
    {
        $parents = locality::find()
            ->select(['id', 'locality_name'])
            ->all();

        return ArrayHelper::map($parents, 'locality_name', 'locality_name');
    }


    /**
     * Поиск по сайту
     * @param $params
     * @return ActiveDataProvider
     */
    public function getSearchSite($params)
    {
        $query = Announcements::find()
            ->where(['status' => AnnouncementsController::STATUS_ACTIVE]);

        $search = htmlspecialchars($params['search-site']);

        if (!empty($search)) {
            $query->andWhere(['like', 'name', $search]);
        } else {
            $search = '0';
            $query->andWhere(['like', 'name', $search]);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'date' => SORT_DESC,
                ]
            ],
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'category_id' => $this->id,
            'date' => $this->date,
            'price' => $this->price,
            'name' => $this->name,
            'city' => $this->city
        ]);

        $query->andFilterWhere(['like', 'author', $this->author])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'img', $this->img]);
        // ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }

    /**
     * задаём фильтр
     */
    public function filter()
    {
        $query = Announcements::find()
            ->where(['status' => AnnouncementsController::STATUS_ACTIVE])
            ->orderBy(['date' => SORT_DESC]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        return $dataProvider;
    }


    /**
     * выборка результатов фильтра
     */
    public function ResultFilter()
    {
        $query = Announcements::find()
            ->where(['status' => AnnouncementsController::STATUS_ACTIVE]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'date' => SORT_DESC,
                ]
            ],
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        $params = Yii::$app->request->get();
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // выбираем категорию
        if (!empty($params['Category']['name'])) {
            $this->category_id = $params['Category']['name'];
        }

        // обработка цены
        $price_ot = htmlspecialchars($params['price_ot']);
        $price_do = htmlspecialchars($params['price_do']);

        if (!empty($price_ot && $price_do)) {
            $query->andFilterWhere(['between', 'price', $price_ot, $price_do]);
        }

        if (!empty($price_ot)) {
            $query->andFilterWhere(['between', 'price', $price_ot, 9999999]);
        }
        if (!empty($price_do)) {
            $query->andFilterWhere(['between', 'price', 0, $price_do]);
        }

        // выбираем город
        if (!empty($params['Locality']['locality_name'])) {
            $city = Locality::find()->where(['id' => $params['Locality']['locality_name']])->one();
            $this->city = $city['locality_name'];
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'category_id' => $this->id,
            'date' => $this->date,
            'price' => $this->price,
            'name' => $this->name,
            'category_id' => $this->category_id,
            'city' => $this->city,
        ]);
        $query->andFilterWhere(['like', 'author', $this->author])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'img', $this->img])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'category_id', $this->category_id]);

        return $dataProvider;
    }


}
