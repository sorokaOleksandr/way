<?php

namespace app\controllers;

use Yii;
use app\models\District;
use app\models\Locality;
use app\models\Region;
use app\models\Category;
use yii\web\Controller;
use app\models\Announcements;
use app\models\Announcement;
use app\models\AnnouncementsSearch;
use yii\web\UploadedFile;

class AnnouncementsController extends Controller
{
    public $option;
    const STATUS_INACTIVE = '0';
    const STATUS_ACTIVE = '1';

    /**
     * выводим категорию
     * @param $id
     * @return string
     */
    public function actionIndex($name, $id)
    {
        $categories = Category::find()
            ->where(['parent_id' => $id])
            ->all();

        return $this->render('categories', compact('categories', 'name'));
    }


    /**
     * @param $id
     * @return string
     * Выборка обьявлений определенной категории
     */
    public function actionCategoryAds($id)
    {
        // находим категорию обьявления
        $category_name = Category::find()
            ->where(['id' => $id])
            ->one();

        // находим родительскую категорию подкатегории
        $parent_category = Category::find()
            ->where(['id' => $category_name->parent_id])
            ->one();

        $parent_category_name = $parent_category->name;
        $parent_category_id = $parent_category->id;

        $searchModel = new AnnouncementsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $id);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'id' => $id,
            'category_name' => $category_name,
            'parent_category_id' => $parent_category_id,
            'parent_category_name' => $parent_category_name]);
    }

    /**
     * подробный просмотр обьявления
     */
    public function actionViewsAnnouncement($id)
    {
        // выборка обьявления по id
        $ads = Announcements::find()
            ->where(['id' => $id])
            ->one();

        // преобразовуем строку в масив
        $imgs = explode(" ", $ads->img);

        // находим категорию обьявления
        $category_name = Category::find()
            ->where(['id' => $ads->category_id])
            ->one();

        // находим родительскую категорию подкатегории
        $parent_category = Category::find()
            ->where(['id' => $category_name->parent_id])
            ->one();

        $parent_category_name = $parent_category->name;
        $parent_category_id = $parent_category->id;

        return $this->render('views-announcement',
            compact('ads', 'category_name', 'parent_category_name', 'parent_category_id', 'imgs'));
    }

    /**
     * @return string
     * поиск по сайту
     */
    public function actionSearchSite()
    {
        $search_van = htmlspecialchars(Yii::$app->request->get('search-site'));
        $searchModel = new AnnouncementsSearch();
        $dataProvider = $searchModel->getSearchSite(Yii::$app->request->queryParams);

        return $this->render('search-site', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'search_van' => $search_van
        ]);
    }


    /**
     * @return string
     * размещение обьявления
     */
    public function actionPlace()
    {
        $modelCat = new Category();
        $modelAnn = new Announcements();
        $modelReg = new Region();
        $modelLocal = new Locality();
        $modelDistrict = new District();

        $modelCat->load(Yii::$app->request->post());
        $modelAnn->load(Yii::$app->request->post());
        $modelReg->load(Yii::$app->request->post());
        $modelLocal->load(Yii::$app->request->post());

        if (Yii::$app->request->isPost) {
            $modelAnn->img = UploadedFile::getInstances($modelAnn, 'img');

            if ($modelCat->validate() && $modelReg->validate() && $modelLocal->validate() && $modelAnn->validate() && $modelAnn->upload()) {
                // проверяем экранируем и очищаем
                $author = htmlspecialchars(trim($modelAnn->author));
                $phone = htmlspecialchars(trim($modelAnn->phone));
                $local_id = htmlspecialchars(trim($modelLocal->locality_name));
                $cat_id = (int)htmlspecialchars(trim($modelCat->name));
                $announcement_name = htmlspecialchars(trim($modelAnn->name));
                $announcement_description = htmlspecialchars(trim($modelAnn->description));
                $img_name_mini = implode(" ", $modelAnn->img_mini);
                $price = htmlspecialchars($modelAnn->price);
                if (empty($price)) {
                    $price = 1;
                }

                // Находим населённый пункт по id
                $local_name = Locality::find()
                    ->select('locality_name')
                    ->where(['id' => $local_id])
                    ->one();

                // Сохраняем в базу данные нового обьявления
                $announcement = new Announcements();
                $announcement->author = (string)$author;
                $announcement->phone = $phone;
                $announcement->city = $local_name->locality_name;
                $announcement->category_id = $cat_id;
                $announcement->name = $announcement_name;
                $announcement->description = $announcement_description;
                $announcement->img = $img_name_mini;
                $announcement->img_mini = $img_name_mini;
                $announcement->price = (int)$price;
                $announcement->status = self::STATUS_INACTIVE;
                $announcement->save();

                Yii::$app->session->setFlash('btn-success');
                return $this->refresh();
            }
        }
        return $this->render('place', [
            'modelAnn' => $modelAnn,
            'modelCat' => $modelCat,
            'modelReg' => $modelReg,
            'modelLocal' => $modelLocal,
            'modelDistrict' => $modelDistrict
        ]);
    }


    /**
     * @return string
     * аякс запрос на выборку категорий
     */
    public function actionAjax()
    {
        if (Yii::$app->request->isAjax) {
            $id = Yii::$app->request->post('id');
            if (!empty($id)) {
                $category = Category::find()
                    ->where('parent_id=:id', [':id' => $id])
                    ->orderBy('name')
                    ->all();
                foreach ($category as $cat) {
                    $this->option .= '<option value="' . $cat->id . '">' . $cat->name . '</option>';
                }
            } else {
                $this->option = "<option value='0'>Будь ласка, виберіть категорію</option>";
            }
        }
        return $this->option;
    }


    /**
     * @return string
     * аякс запрос на выборку населённых пунктов
     */
    public function actionAjaxs()
    {
        if (Yii::$app->request->isAjax) {
            $id = Yii::$app->request->post('id');
            $this->option = "<option value='0'> </option>";
            if (!empty($id)) {
                $local = Locality::find()
                    ->where('region_id=:id', [':id' => $id])
                    ->orderBy('locality_name')
                    ->all();
                foreach ($local as $loc) {
                    $this->option .= '<option value="' . $loc->id . '">' . $loc->locality_name . '</option>';
                }
            } else {
                $this->option = "<option value='0'>Будь ласка, виберіть область</option>";
            }
        }
        return $this->option;
    }


    /**
     * @return string
     * аякс запрос на выборку раёнов
     */
    public function actionAjaxd()
    {
        if (Yii::$app->request->isAjax) {
            $id = Yii::$app->request->post('id');
            $this->option = "<option value='0'> </option>";
            if (!empty($id)) {
                $local = District::find()
                    ->where('locality_id=:id', [':id' => $id])
                    ->orderBy('district_name')
                    ->all();
                foreach ($local as $loc) {
                    $this->option .= '<option value="' . $loc->id . '">' . $loc->district_name . '</option>';
                }

            } else {
                $this->option = "<option value='0'>Будь ласка, виберіть населений пункт</option>";
            }
        }
        return $this->option;
    }


    /**
     * фильтрация данных
     */
    public function actionFilter()
    {
        $modelCat = new Category();
        $modelAnn = new Announcements();
        $modelReg = new Region();
        $modelLocal = new Locality();
        $modelDistrict = new District();

        $searchModel = new AnnouncementsSearch();
        $dataProvider = $searchModel->filter(Yii::$app->request->queryParams);

        return $this->render('_search', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'modelCat' => $modelCat,
            'modelAnn' => $modelAnn,
            'modelReg' => $modelReg,
            'modelLocal' => $modelLocal,
            'modelDistrict' => $modelDistrict
        ]);
    }

    public function actionFilterResult()
    {
        $searchModel = new AnnouncementsSearch();
        $dataProvider = $searchModel->ResultFilter();
        return $this->render('filter', ['dataProvider' => $dataProvider]);
    }

}
