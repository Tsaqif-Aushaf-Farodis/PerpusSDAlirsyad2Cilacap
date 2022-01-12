<?php

namespace app\controllers;

use Yii;
// use app\models\User;
use app\models\DataBuku;
use app\models\Peminjaman;
use app\models\PeminjamanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use webvimark\modules\UserManagement\models\User;

/**
 * PeminjamanController implements the CRUD actions for Peminjaman model.
 */
class PeminjamanController extends Controller
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
            //             'roles' => ['@']
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
     * Lists all Peminjaman models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PeminjamanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionDipesan()
    {
        if (User::hasRole(['admin', 'petugas'], $superAdminAllowed = true)){
            $qry = "SELECT kode_peminjaman, peminjaman.status, tgl_pesan, user.username, data_buku.judul_buku FROM peminjaman INNER JOIN user ON peminjaman.id = user.id INNER JOIN data_buku ON peminjaman.id_buku = data_buku.id_buku WHERE peminjaman.status = 'Dipesan'";
        }else if (User::hasRole(['walisantri'])){
            $username = Yii::$app->user->username;
            $qry = "SELECT kode_peminjaman, peminjaman.status, tgl_pesan, user.username, data_buku.judul_buku FROM peminjaman INNER JOIN user ON peminjaman.id = user.id INNER JOIN data_buku ON peminjaman.id_buku = data_buku.id_buku WHERE peminjaman.status = 'Dipesan' and username='$username'";
        }

        $connection = Yii::$app->db;
        $searchModel = new PeminjamanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model = $connection->createCommand($qry)->queryAll();
        
        return $this->render('dipesan', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model
        ]);
    }

    public function actionTransaksipesan()
    {
        $connection = Yii::$app->db;
        $searchModel = new PeminjamanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $qry = "SELECT kode_peminjaman, peminjaman.status, tgl_pesan, user.username, data_buku.judul_buku FROM peminjaman INNER JOIN user ON peminjaman.id = user.id INNER JOIN data_buku ON peminjaman.id_buku = data_buku.id_buku WHERE peminjaman.status = 'Dipesan'";
        $model = $connection->createCommand($qry)->queryAll();

        return $this->render('transaksipesan', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model
        ]);
    }

    public function actionLaporanpesan()
    {
        $connection = Yii::$app->db;
        $searchModel = new PeminjamanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $qry = "SELECT kode_peminjaman, peminjaman.status, tgl_pesan, user.username, data_buku.judul_buku FROM peminjaman INNER JOIN user ON peminjaman.id = user.id INNER JOIN data_buku ON peminjaman.id_buku = data_buku.id_buku WHERE peminjaman.status = 'Dipesan'";
        $model = $connection->createCommand($qry)->queryAll();

        return $this->render('laporanpesan', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model
        ]);
    }

    public function actionDipinjam()
    {
        $connection = Yii::$app->db;
        $searchModel = new PeminjamanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $qry = "SELECT kode_peminjaman, peminjaman.status, tgl_pinjam, user.username, data_buku.judul_buku FROM peminjaman INNER JOIN user ON peminjaman.id = user.id INNER JOIN data_buku ON peminjaman.id_buku = data_buku.id_buku WHERE peminjaman.status = 'Dipinjam'";
        $model = $connection->createCommand($qry)->queryAll();

        return $this->render('dipinjam', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model
        ]);
    }

    public function actionTransaksipinjam()
    {
        $connection = Yii::$app->db;
        $searchModel = new PeminjamanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $qry = "SELECT kode_peminjaman, peminjaman.status, tgl_pinjam, user.username, data_buku.judul_buku FROM peminjaman INNER JOIN user ON peminjaman.id = user.id INNER JOIN data_buku ON peminjaman.id_buku = data_buku.id_buku WHERE peminjaman.status = 'Dipinjam'";
        $model = $connection->createCommand($qry)->queryAll();

        return $this->render('transaksipinjam', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model
        ]);
    }

    public function actionLaporanpinjam()
    {
        $connection = Yii::$app->db;
        $searchModel = new PeminjamanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $qry = "SELECT kode_peminjaman, peminjaman.status, tgl_pinjam, user.username, data_buku.judul_buku FROM peminjaman INNER JOIN user ON peminjaman.id = user.id INNER JOIN data_buku ON peminjaman.id_buku = data_buku.id_buku WHERE peminjaman.status = 'Dipinjam'";
        $model = $connection->createCommand($qry)->queryAll();

        return $this->render('laporanpinjam', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model
        ]);
    }

    public function actionDikembalikan()
    {
        $connection = Yii::$app->db;
        $searchModel = new PeminjamanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $qry = "SELECT kode_peminjaman, peminjaman.status, tgl_kembali, user.username, data_buku.judul_buku FROM peminjaman INNER JOIN user ON peminjaman.id = user.id INNER JOIN data_buku ON peminjaman.id_buku = data_buku.id_buku WHERE peminjaman.status = 'Dikembalikan'";
        $model = $connection->createCommand($qry)->queryAll();

        return $this->render('dikembalikan', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model
        ]);
    }

    public function actionTransaksikembali()
    {
        $connection = Yii::$app->db;
        $searchModel = new PeminjamanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $qry = "SELECT kode_peminjaman, peminjaman.status, tgl_kembali, user.username, data_buku.judul_buku FROM peminjaman INNER JOIN user ON peminjaman.id = user.id INNER JOIN data_buku ON peminjaman.id_buku = data_buku.id_buku WHERE peminjaman.status = 'Dikembalikan'";
        $model = $connection->createCommand($qry)->queryAll();

        return $this->render('transaksikembali', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model
        ]);
    }

    public function actionLaporankembali()
    {
        $connection = Yii::$app->db;
        $searchModel = new PeminjamanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $qry = "SELECT kode_peminjaman, peminjaman.status, tgl_kembali, user.username, data_buku.judul_buku FROM peminjaman INNER JOIN user ON peminjaman.id = user.id INNER JOIN data_buku ON peminjaman.id_buku = data_buku.id_buku WHERE peminjaman.status = 'Dikembalikan'";
        $model = $connection->createCommand($qry)->queryAll();

        return $this->render('laporankembali', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model
        ]);
    }

    /**
     * Displays a single Peminjaman model.
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
     * Creates a new Peminjaman model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Peminjaman();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->kode_peminjaman]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionPemesanan()
    {
        $model = new Peminjaman();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->kode_peminjaman]);
        } else {
            return $this->render('pemesanan', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Peminjaman model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->kode_peminjaman]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Peminjaman model.
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
     * Finds the Peminjaman model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Peminjaman the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Peminjaman::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionPesan($id){
        var_dump($id);
        $connection = Yii::$app->db;
        $qry = "SELECT * from data_buku WHERE data_buku.id_buku = 1";
        $model = $connection->createCommand($qry)->queryAll();

        return $this->render('laporankembali', [
            'model' => $model
        ]);
    }
}
