<?php

namespace app\controllers;

use app\models\Comments;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Categories;
use app\models\Articles;
use app\models\ArticlesSearch;
use app\models\MarkArticle;

class SiteController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
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


    public function actionIndex()
    {
        $slider_posts = Articles::find()
            ->orderBy(['rand()' => SORT_DESC])
            ->limit(5)
            ->all();

        $last_three_categories = Categories::find()
            ->orderBy(['created_at' => SORT_DESC])
            ->limit(3)
            ->all();

        $last_five_posts = Articles::find()
            ->orderBy(['created_at' => SORT_DESC])
            ->limit(5)
            ->all();

        $searchModel = new ArticlesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'slider_posts' => $slider_posts,
            'last_categories' => $last_three_categories,
            'last_posts' => $last_five_posts,
            'dataProvider' => $dataProvider
        ]);
    }


    public function actionSingle($post_id)
    {
        $post = Articles::findOne(['id' => $post_id]);

        $tags = MarkArticle::find()
            ->where(['post_id' => $post->id])
            ->all();

        $last_five_posts = Articles::find()
            ->orderBy(['created_at' => SORT_DESC])
            ->limit(5)
            ->all();
        
        $comment_count = Comments::find()
            ->where(['post_id' => $post_id, 'parent_id' => 0])
            ->count();

        return $this->render('single', [
            'post' => $post,
            'tags' => $tags,
            'last_posts' => $last_five_posts,
            'comment_count' => $comment_count
        ]);
    }

    public function actionDeleteComment()
    {
        if(Yii::$app->request->post()){
            $comment = Comments::findOne(['id' => Yii::$app->request->post('comment_id')]);

            if($comment){
                $comment->comment = 'Коментарій був видалений!';
                $comment->save(false);
                Yii::$app->session->setFlash('info', 'Коментарій видалений!');

                return $this->redirect(['single', 'post_id' => $comment->post_id]);
            }
        }
    }


    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }


    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }





    public function actionAbout()
    {
        return $this->render('about');
    }
}
