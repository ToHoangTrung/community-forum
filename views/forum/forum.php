<style>
    <?php
        use app\core\mvc\Application;
        include_once Application::$ROOT_DIR."/public/css/$css";
    ?>
</style>
<section class="forum">
    <div class="content">
        <div class="main-list">
            <div class="main-item">
                <div class="introduce">
                    <p>Đại sảnh</p>
                    <p></p>
                    <p>Posts</p>
                    <p>Last post</p>
                </div>
                <div class="list">
                <?php foreach ((array)$catalogs as $catalog) :?>
                    <div class="item">
                        <i class="fas fa-comments item-logo"></i>
                        <div class="headline">
                            <a href="/forum/posts/catalog?id=<?php echo $catalog['id']?>"><?php echo $catalog['name']?></a>
                        </div>
                        <p></p>
                        <p><?php echo $catalog['count_post']?></p>
                        <div class="newest-post">
                        <?php if($catalog['new_post']!=NULL){?>
                            <div class="avatar">
                                <img src="<?php echo '/assets/image/user/'.$catalog['new_post_user']['image_url'] ?>"/>                           
                            </div>
                            <div class="info">
                                <a class="name" href="/forum/posts/info?id=<?php echo $catalog['new_post']['id']?>"><?php echo $catalog['new_post']['headline']?></a>
                                <p class="time"><?php echo $catalog['new_post']['updated_date']?> </p>
                                <p class="author">by <a href="/members/profile?id=<?php echo $catalog['new_post_user']['id']?>"><?php echo $catalog['new_post_user']['name']?></a></p>
                            </div>
                        <?php }else{?>
                            <p>No Post</p>
                        <?php }?>
                        </div>
                    </div>
                <?php endforeach;?>
                </div>
            </div>
        </div>
        <div class="bonus-info-list">
        </div>
    </div>
</section>