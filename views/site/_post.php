<?php
use yii\helpers\Url;
use app\models\Comments;

$comment_count = Comments::find()
    ->where(['post_id' => $model->id, 'parent_id' => 0])
    ->count();

?>

<!-- Single Post -->
<div class="col-12">
    <div class="list-blog single-post d-sm-flex wow fadeInUpBig" data-wow-delay=".2s">
        <!-- Post Thumb -->
        <div class="post-thumb">
            <img src="<?= isset($model->image) ? '/web/'.$model->image : '' ?>" alt="post_image">
        </div>
        <!-- Post Content -->
        <div class="post-content">
            <div class="post-meta d-flex">
                <div class="post-author-date-area d-flex">
                    <!-- Post Author -->
                    <div class="post-author">
                        <a href="#"><?= $model->user->name ?></a>
                    </div>
                   
                </div>
                <!-- Post Comment & Share Area -->
                <div class="post-comment-share-area d-flex">
                    <!-- Post Comments -->
                    <div class="post-comments">
                       
                    </div>
                </div>
            </div>
            <a href="<?= Url::to(['/site/single', 'post_id' => $model->id]) ?>">
                <h4 class="post-headline"><?= $model->title ?></h4>
            </a>
			 <!-- Post Date -->
                    <div class="post-date">
                        <a href="<?= Url::to(['/site/single', 'post_id' => $model->id]) ?>"><?= date('F d, Y', strtotime($model->created_at)) ?></a>
                    </div>
            <p><?= $model->short_description ?></p>
            <a href="<?= Url::to(['/site/single', 'post_id' => $model->id]) ?>" class="read-more">Переглянути повну статтю...</a>
        </div>
    </div>
</div>
