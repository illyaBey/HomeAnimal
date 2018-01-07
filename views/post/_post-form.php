<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Categories;
use powerkernel\tinymce\TinyMce;
use kartik\select2\Select2;
use app\models\Marks;
?>

<div class="gift-request-form">
    <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'category_id')->dropDownList(
        ArrayHelper::map(Categories::find()->all(), 'id', 'title'), ['prompt'=>'Оберіть категорію']);
    ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'short_description')->widget(TinyMce::className(), [
        'options' => ['rows' => 6],
        'clientOptions' => [
        'height'=>320,
        'plugins' => [
                "advlist autolink lists link charmap print preview anchor",
            ],
            'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat code"
        ]
    ]);?>

    <?= $form->field($model, 'description')->widget(TinyMce::className(), [
        'options' => ['rows' => 6],
        'clientOptions' => [
            'height'=>320,
            'plugins' => [
                "advlist autolink lists link charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste image"
            ],
            'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat code"
        ]
    ]);?>

    <?= $form->field($model, 'article_img')->fileInput() ?>

    <?= $form->field($model, 'mark_ids')->widget(Select2::className(), [
        'model' => $model,
        'attribute' => 'tag_ids',
        'data' => ArrayHelper::map(Marks::find()->all(), 'name', 'name'),
        'options' => [
        'multiple' => true,
        ],
        'pluginOptions' => [
            'tags' => true,
        ],
    ]); ?>

   

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Оприлюднити' : 'Змінити', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>