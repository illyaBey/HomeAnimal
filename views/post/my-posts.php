<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'Статті';
?>


<div class="category-index">

    <div class="container">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Додати статтю', ['create'], ['class' => 'btn btn-success']) ?> <?= Html::a('Категорії', ['/category/index'], ['class' => 'btn btn-info']) ?>
        </p>
            <div class="table table-responsive">
                <?php Pjax::begin(); ?>
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'tableOptions' => [
                        'class' => 'table table-hover table-bordered'
                        ],
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            [
                                'header' => 'Фото',
                                'format' => 'raw',
                                'value' => function($model){
                                    return Html::img('/web/'.$model->image, [
                                        'alt' => 'image',
                                        'class' => 'img img-responsive',
                                        'style' => [
                                            'height' => '100px',
                                            'width' => 'auto'
                                        ]
                                    ]);
                                }
                            ],
                            [
                                'header' => 'Категорія',
                                'value' => 'category.title'
                            ],
                            [
                                'header' => 'Заголовок',
                                'value' => 'title'
                            ],
                            [
                                'header' => 'Короткий опис статті',
                                'format' => 'raw',
                                'value' => 'short_description'
                            ],
                            [
                                'header' => 'Дата публікації',
                                'value' => 'created_at'
                            ],
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'template' => '{update} {delete}'
                            ],
                        ],
                    ]); ?>
                <?php Pjax::end(); ?>
            </div>

    </div>
</div>
