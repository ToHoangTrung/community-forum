<style>
    <?php
        use app\core\mvc\Application;
        include_once Application::$ROOT_DIR."/public/css/$css";
    ?>
</style>
<!--<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>-->
<script src="//cdn.ckeditor.com/4.16.0/full/ckeditor.js"></script>
<section class="post">
    <div class="top-headline">
        <p class="headline"><?php echo $post['headline'] ?></p>
        <div class="info-action">
            <div class="author">
                <i class="fas fa-user"></i>
                <a href="/"><?php echo $author['username'] ?></a>
                <i class="fas fa-circle" style="font-size: 5px"></i>
                <i class="far fa-clock"></i>
                <a href="/"><?php echo $post['created_date'] ?></a>
            </div>
            <div class="action">
                <button class="follow-btn">Theo dõi</button>
                <button><i class="fas fa-stream"></i></button>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="topic-list">
            <div class="topic-item">
                <div class="user-block">
                    <div class="triangle">
                        <div class="arrow-left"></div>
                    </div>
                    <img class="user-image" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRPa44TpuO9d9cdIvsvkK4DcJEVcR1ntqWYWYp2dVM7dKfr0Ut7Y9EDuBRgcAoZNj5HkgU&usqp=CAU"/>
                    <a href="/" class="user-name"><?php echo $author['name']?></a>
                    <p class="user-rank">Thành viên thân thiết</p>
                </div>
                <div class="topic-content-block">
                    <div class="topic-nav">
                        <p class="topic-time-up"><?php echo $post['updated_date'] ?></p>
                        <div class="action">
                            <i class="fas fa-share-alt"></i>
                            <i class="far fa-clock"></i>
                        </div>
                    </div>
                    <div class="hr"></div>
                    <div class="main-content" id="main-content">
                    </div>
                    <script>
                        $('#main-content').html(<?php echo json_encode($content) ?>);
                    </script>
                    <div class="topic-footer">
                        <div class="left">
                            <a href="/">Báo cáo</a>
                        </div>
                        <div class="right">
                            <i class="fas fa-thumbs-up"></i>
                            <a href="/">Thích</a>
                            <i class="fas fa-reply"></i>

                            <a href="#C4">Trả lời</a>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            //var_dump($post['comments']);
            foreach ((array) $post['comments'] as &$comment) :?>
            <div class="content">
                <div class="topic-list">
                    <div class="topic-item">
                        <div class="user-block">
                            <div class="triangle">
                                <div class="arrow-left"></div>
                            </div>
                            <img class="user-image" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRPa44TpuO9d9cdIvsvkK4DcJEVcR1ntqWYWYp2dVM7dKfr0Ut7Y9EDuBRgcAoZNj5HkgU&usqp=CAU"/>
                            <a href="/" class="user-name"><?php echo $comment['user']['name']?></a>
                            <p class="user-rank">Thành viên thân thiết</p>
                        </div>
                        <div class="topic-content-block">
                            <div class="topic-nav">
                                <p class="topic-time-up"><?php echo $comment['updated_date'] ?></p>
                                <div class="action">
                                    <i class="fas fa-share-alt"></i>
                                    <i class="far fa-clock"></i>
                                </div>
                            </div>
                            <div class="hr"></div>
                            <div class="main-content-comment" id="<?php echo 'main-content-comment'.$comment['id'] ?>">
                            </div>
                           <script>
                                $('#main-content-comment<?php echo $comment['id'] ?>').html(<?php echo json_encode($comment['content']) ?>);
                           </script>
                            <div class="topic-footer">
                                <div class="left", style="bottom:0px;margin-top: 120px ">
                                    <a href="/">Báo cáo</a>
                                </div>
<!--                                <div class="right", style="margin-top: 120px">-->
<!--                                    <i class="fas fa-thumbs-up"></i>-->
<!--                                    <a href="/">Thích</a>-->
<!--                                    <i class="fas fa-reply"></i>-->
<!--                                    <a href="/">Trả lời</a>-->
<!--                                </div>-->
                            </div>
                        </div>
                    </div>
            <?php endforeach;?>

            <?php
            if (Application::isGuest()): ?>
            <?php else: ?>
                <div class="topic-item user-comment">
                    <div class="user-block">
                        <div class="triangle">
                            <div class="arrow-left"></div>
                        </div>
                        <img class="user-image" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRPa44TpuO9d9cdIvsvkK4DcJEVcR1ntqWYWYp2dVM7dKfr0Ut7Y9EDuBRgcAoZNj5HkgU&usqp=CAU"/>
                        <a href="/" class="user-name"><?php echo Application::$app->user->name?></a>
                        <p class="user-rank">Thành viên thân thiết</p>
                    </div>
                    <form id="C4" action="" method="post" class="topic-content-block">
                        <div class="tutorial">Nhập câu trả lời của bạn ở đây</div>
                        <textarea name="editor" placeholder="OK"></textarea>
                        <button class="comment-btn" type="submit"><i class="fas fa-reply"></i>Trả lời</button>
                    </form>
                </div>
            <?php endif; ?>

        </div>
    </div>
    <script>
        CKEDITOR.replace( 'editor').config({
            toolbarCanCollapse: true
        });
    </script>
</section>