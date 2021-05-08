<style>
    <?php
        use app\core\mvc\Application;
        $rootPath = Application::$ROOT_DIR;
        include_once $rootPath."/public/css/$css";
    ?>
</style>
<section class="posts">
    <div class="top-headline">
        <a href="<?php echo '/forum/posts/catalog?id='.$catalog['id'] ?>"><?php echo $catalog['name'] ?></a>
    </div>
    <div class="content">
        <div class="main-list">
            <div class="introduce">
                <a href="/">Filter<i class="fas fa-caret-down"></i></a>
            </div>
            <div class="list">
                <?php
                foreach ((array)$posts as $post) :?>
                    <div class="item">
                        <div class="avatar">
                            <img src="<?php echo '/assets/image/user/'.$post['user']['image_url'] ?>"/>
                        </div>
                        <div class="headline">
                            <a href="<?php echo '/forum/posts/info?id='.$post['id'] ?>" class="title"><?php echo $post['headline']; ?></a>
                            <div class="sub-title">
                                <a href="/"><?php echo $post['user']['username']; ?></a>
                                <i class="fas fa-circle"></i>
                                <p><?php echo $post['updated_date']; ?></p>
                            </div>
                        </div>
                        <div class="summary">
                            <div class="replies">
                                <p>Replies:</p>
                                <p>28</p>
                            </div>
                            <div class="views">
                                <p>Views</p>
                                <p>14k</p>
                            </div>
                        </div>
                        <div class="tag-list">
                            <?php
                            foreach ((array)$post['tags'] as $tag) :?>
                                <a href="<?php echo '/forum/posts/tag?id='.$catalog['id'] ?>"><?php echo $tag['name']; ?></a>
                            <?php endforeach;?>
                        </div>
                    </div>
                <?php endforeach;?>

            </div>
        </div>
        <div class="bonus-info-list">
        </div>
    </div>
    <div class="pagination">
        <a href="/" style="background: #2E3539; color: white;">1</a>
        <a href="/">2</a>
        <a href="/">3</a>
        <a href="/">4</a>
        <a href="/">5</a>
        <a href="/">Next<i class="fas fa-caret-right"></i></a>
    </div>
</section>