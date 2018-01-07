<?php
use yii\helpers\Url;
use isaurssaurav\yii\comment\widgets\CommentWidget;

$this->title = 'Перегляд статті';
?>

<!-- ****** Single Blog Area Start ****** -->
<section class="single_blog_area section_padding_80">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="row no-gutters">

             

                    <!-- Single Post -->
                    <div class="col-10 col-sm-11">
                        <div class="single-post">
						
							 <a href="#">
                                    <h2 class="post-headline"><?= $post->title ?></h2>
                                </a>
                            <!-- Post Thumb -->
                            <div class="post-thumb">
                                <img src="<?= isset($post->image) ? '/web/'.$post->image : '' ?>" alt="post_image">
                            </div>
							
                            <!-- Post Content -->
                            <div class="post-content">
                                <div class="post-meta d-flex">
                                    <div class="post-author-date-area d-flex">
                                        <!-- Post Author -->
                                        <div class="post-author">
                                            <a href="#"><?= $post->user->name ?></a>
                                        </div>
                                        <!-- Post Date -->
                                        <div class="post-date">
                                            <a href="#"><?= date('F d, Y', strtotime($post->created_at)) ?></a>
                                        </div>
                                    </div>
                                    <!-- Post Comment & Share Area -->
                                    <div class="post-comment-share-area d-flex">
                                        <div class="post-comments">
                                            
                                        </div>
                                    </div>
                                </div>
                               
                                <?= $post->description ?>
                            </div>
                        </div>

                      

                        <?= CommentWidget::widget([
                            'post_id' => $_GET['post_id']
                        ]); ?>

                    </div>
                </div>
            </div>

            <!-- ****** Blog Sidebar ****** -->
			
            <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                <div class="blog-sidebar mt-5 mt-lg-0">

                    <!-- Single Widget Area -->
                    <div class="single-widget-area subscribe_widget text-center">
                        <div class="widget-title">
                            <h6>Мітки статті</h6>
                        </div>
                       
					     <!-- Tags Area -->
                        <?php if(isset($tags)): ?>
                            <div class="tags-area">
                                <?php foreach($tags as $mark): ?>
                                    <a href="#"><?= $mark->marks->name ?></a>
									
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
					   
                    </div>

             

                </div>
            </div>
        </div>
    </div>
</section>
<!-- ****** Single Blog Area End ****** -->
