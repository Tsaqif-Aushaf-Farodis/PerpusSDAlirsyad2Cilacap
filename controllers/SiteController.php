<?php

namespace app\controllers;

use app\models\base\DataBuku as BaseDataBuku;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\DataBuku;
use app\models\DataBukuSearch;
use app\models\Peminjaman;
use webvimark\modules\UserManagement\models\User;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        // $connection = Yii::$app->db;
        // $qry = [
        //     $this->data['count_pengguna']=$this->db->query("SELECT * FROM user")->num_rows(),
		//     $this->data['count_buku']=$this->db->query("SELECT * FROM data_buku")->num_rows(),
		//     $this->data['count_pinjam']=$this->db->query("SELECT * FROM peminjaman WHERE status = 'Dipinjam'")->num_rows(),
		//     $this->data['count_kembali']=$this->db->query("SELECT * FROM peminjaman WHERE status = 'Dikembalikan'")->num_rows()
        // ];
        
        // $model = $connection->createCommand($qry)->queryAll();
        return $this->render('index',[
            // 'model' => $model
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            // return $this->goBack();
            $this->redirect(array('data-buku/index'));
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionDatabuku()
    {
        $searchModel = new DataBukuSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model = new DataBuku();

        return $this->render('databuku',[
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model
        ]);
    }

    public function actionCreate()
    {
        $model = new Peminjaman();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->kode_peminjaman]);
        } else {
            return $this->render('../peminjaman/create', [
                'model' => $model,
            ]);
        }
    }

    public function actionView($id)
    {
        $model = $this->findModel($id);
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
}
