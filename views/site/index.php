<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;
use yii\widgets\Pjax;
use app\models\Comment;

$this->title = 'Гаджети (блог)';
?>

<?php if(isset($slider_posts) && !empty($slider_posts)): ?>

<?php endif; ?>

<!-- ****** Blog Area Start ****** -->
<section class="blog_area section_padding_0_80">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="row">
                    <!-- ******* List Blog Area Start ******* -->

                    <?php Pjax::begin(['id' => 'a_list']); ?>
                        <?= ListView::widget([
                            'dataProvider' => $dataProvider,
                            'summary' => '',
                            'itemView' => '_post',
                            'options' => [
                                'tag' => false,
                            ],
                            'itemOptions' => [
                                'tag' => false
                            ]
                        ]); ?>
                    <?php Pjax::end() ?>


                </div>
            </div>

            <!-- ****** Blog Sidebar ****** -->
            <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                <div class="blog-sidebar mt-5 mt-lg-0">

                    <!-- Single Widget Area -->
          <!--          <div class="single-widget-area subscribe_widget text-center">
                        <div class="widget-title">
                            <h6>Категорії</h6>
                        </div>
                        
                    </div>

                    <!-- Single Widget Area -->
                                   
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ****** Blog Area End ****** -->