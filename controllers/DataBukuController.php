<?php

namespace app\controllers;

use Yii;
use app\models\DataBuku;
use app\models\DataBukuSearch;
use Exception;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Peminjaman;

/**
 * DataBukuController implements the CRUD actions for DataBuku model.
 */
class DataBukuController extends Controller
{
    public function behaviors()
    {
        return [
            // 'access' => [
            //     'class' => AccessControl::className(),
            //     'only' => ['create', 'update', 'index'],
            //     'rules' => [
            //         [
            //             'allow' => true,
            //             'roles' => ['@', 'Admin']
            //         ]
            //     ]
            // ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all DataBuku models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DataBukuSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DataBuku model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new DataBuku model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DataBuku();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id_buku]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing DataBuku model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id_buku]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing DataBuku model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->deleteWithRelated();

        return $this->redirect(['index']);
    }

    /**
     * Finds the DataBuku model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DataBuku the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DataBuku::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
