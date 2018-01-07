<?php

namespace app\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;
use app\models\Articles;

class PostController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['my-posts', 'create', 'update', 'delete'],
                'rules' => [
                    [
                        'actions' => ['my-posts', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionMyPosts()
    {
        $user = Yii::$app->user->identity;
        
        $dataProvider = new ActiveDataProvider([
            'query' => 
                Articles::find()
                    ->where(['user_id' => $user->getId()])
                    ->orderBy(['created_at' => SORT_DESC]),
            'pagination' => [
                'pageSize' => 10
            ]
        ]);
        
        return $this->render('my-posts', [
            'dataProvider' => $dataProvider
        ]);
    }
    
    public function actionCreate()
    {
        $model = new Articles();
        $user_id = Yii::$app->user->identity->getId();
        
        if($model->load(Yii::$app->request->post())){
            $model->user_id = $user_id;

            if($model->save()){
                $imageName = uniqid();
                $model->article_img = UploadedFile::getInstance($model, 'article_img');
                $model->article_img->saveAs( 'post-image/'.$imageName.'.'.$model->article_img->extension );
                $model->image = 'post-image/'.$imageName.'.'.$model->article_img->extension;
                $model->save(false);
                
                Yii::$app->session->setFlash('success', 'Новость опубликована!');
                
                return $this->redirect('my-posts');
            } else {
                Yii::$app->session->setFlash('danger', 'Невозможно опубликовать новость!');

                return $this->redirect('create');
            }
        } elseif(!\Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->get());
            $model->mark_ids = ArrayHelper::map($model->marks, 'name', 'name');
        }
        
        return $this->render('create', [
            'model' => $model
        ]);
    }

    public function actionUpdate($id)
    {
        $user_id = Yii::$app->user->identity->getId();
        $model = Articles::findOne(['id' => $id, 'user_id' => $user_id]);

        if($model){

            if(!\Yii::$app->request->isPost) {
                $model->load(Yii::$app->request->get());
                $model->mark_ids = ArrayHelper::map($model->marks, 'name', 'name');
            }

            if($model->load(Yii::$app->request->post()) && $model->save()){
                $imageName = uniqid();
                $model->article_img = UploadedFile::getInstance($model, 'post_image');
                
                if (!empty($model->article_img)) {

                    if (!empty($model->image)) {
                        unlink(getcwd() . '/' . $model->image);
                    }

                    $model->article_img->saveAs('post-image/' . $imageName . '.' . $model->article_img->extension);
                    $model->image = 'post-image/' . $imageName . '.' . $model->article_img->extension;
                    $model->save(false);
                }

                Yii::$app->session->setFlash('success', 'Новость опубликована!');

                return $this->redirect('my-posts');

            } else {

                return $this->render('update', [
                    'model' => $model
                ]);
            }

        } else {
            Yii::$app->session->setFlash('warning', 'Редактировать можно только свои посты!');

            return $this->redirect('my-posts');
        }
    }

    public function actionDelete($id)
    {
        $article = Articles::findOne(['id' => $id]);

        if($article && $article->delete()) {

            if (!empty($article->image)){
                unlink(getcwd().'/'.$article->image);
            }
            Yii::$app->session->setFlash('success', 'Пост удален!');

            return $this->redirect('my-posts');
        } else {
            Yii::$app->session->setFlash('danger', 'Не удалось удалить пост!');

            return $this->redirect('my-posts');
        }
    }
}
