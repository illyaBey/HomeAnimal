<?php

namespace app\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\UploadedFile;
use app\models\Categories;
use app\models\Post;

class CategoryController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'create', 'update', 'delete'],
                'rules' => [
                    [
                        'actions' => ['index', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' =>
                Categories::find()->orderBy(['created_at' => SORT_DESC]),
            'pagination' => [
                'pageSize' => 10
            ]
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionCreate()
    {
        $model = new Categories();

        if($model->load(Yii::$app->request->post())){

            if($model->save()){
                $imageName = uniqid();
                $model->cat_image = UploadedFile::getInstance($model, 'cat_image');
                $model->cat_image->saveAs( 'post-image/'.$imageName.'.'.$model->cat_image->extension );
                $model->image = 'post-image/'.$imageName.'.'.$model->cat_image->extension;
                $model->save(false);

                Yii::$app->session->setFlash('success', 'Категорію додано!');

                return $this->redirect('index');
            } else {
                Yii::$app->session->setFlash('danger', 'Неожливо додати категорію!');

                return $this->redirect('create');
            }
        }

        return $this->render('create', [
            'model' => $model
        ]);
    }

    public function actionUpdate($id)
    {
        $model = Categories::findOne(['id' => $id]);

        if($model->load(Yii::$app->request->post()) && $model->save()){
            $imageName = uniqid();
            $model->cat_image = UploadedFile::getInstance($model, 'cat_image');
            if (!empty($model->cat_image)) {

                if (!empty($model->image)){
                    unlink(getcwd().'/'.$model->image);
                }

                $model->cat_image->saveAs('post-image/' . $imageName . '.' . $model->cat_image->extension);
                $model->image = 'post-image/' . $imageName . '.' . $model->cat_image->extension;
                $model->save(false);
            }

            Yii::$app->session->setFlash('info', 'Категорію відредаговано!');

            return $this->redirect('index');
        }

        return $this->render('update', [
            'model' => $model
        ]);
    }

    public function actionDelete($id)
    {
        $category = Categories::findOne(['id' => $id]);

        if($category && $category->delete()){
            if (!empty($category->image)){
                unlink(getcwd().'/'.$category->image);
            }
            Yii::$app->session->setFlash('danger', 'Категорія видалена!');

            return $this->redirect('index');
        } else {
            Yii::$app->session->setFlash('danger', 'Не вийшло видалити категорію!');

            return $this->redirect('index');
        }
    }
}
