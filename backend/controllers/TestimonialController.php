<?php

namespace backend\controllers;

use common\models\File;
use common\models\Project;
use common\models\Testimonial;
use backend\models\TestimonialSearch;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TestimonialController implements the CRUD actions for Testimonial model.
 */
class TestimonialController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::class,
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['manageTestimonials'],
                        ],
                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Testimonial models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TestimonialSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'projects' => ArrayHelper::map(Project::find()->all(), 'id', 'name'),
        ]);
    }

    /**
     * Displays a single Testimonial model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Testimonial model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Testimonial();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->loadUploadedImageFile();
                if ($model->saveImage() && $model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        } else {
            $model->project_id = $this->request->get('project_id');
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'projects' => $this->loadProjects(),
        ]);
    }

    /**
     * Updates an existing Testimonial model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->loadUploadedImageFile();
            if ($model->saveImage() && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'projects' => $this->loadProjects(),
        ]);
    }

    /**
     * Deletes an existing Testimonial model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionDeleteCustomerImage()
    {
        $file = File::findOne($this->request->post('key'));
        if ($file->delete()) {
            return json_encode(null);
        }
        return json_encode(['error' => true]);
    }

    /**
     * Finds the Testimonial model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Testimonial the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Testimonial::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    private function loadProjects()
    {
        return ArrayHelper::map(Project::find()->asArray()->all(), 'id', 'name');
    }
}
