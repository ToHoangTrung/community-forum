<style>
    <?php
        use app\core\mvc\Application;
        include_once Application::$ROOT_DIR."/public/css/$css";
    ?>
</style>
<section class="members">
    <div class="top-headline">
        <p>Members list</p>
    </div>
    <div class="content">
        <div class="bonus-info-list">
        </div>
        <div class="main-list">
            <div class="introduce">
                <p>Name</p>
                <p>Posts</p>
                <p>Rating</p>
                <div class="filter-block">
                    <p>Last post</p>
                    <a href="/">Filter<i class="fas fa-caret-down"></i></a>
                </div>

            </div>
            <div class="list">
               <?php foreach ((array)$members as $member) :?>
                    <div class="item">
                        <div class="avatar">
                            <img src="<?php echo '/assets/image/user/'.$member['image_url']?>"/>
                        </div>
                        <div class="headline">
                            <a href="/members/profile?id=<?php echo $member['id']?>"><?php echo $member['name']?></a>
                        </div>
                        <p><?php echo $member['count_post']?></p>
                        <p><?php echo $member['avg_rating']?></p>
                        <div class="newest-post">
                            <a class="name" href="/forum/posts/info?id=<?php echo $member['new_post']['id']?> "><?php echo $member['new_post']['headline']?></a>
                            <p class="time"><?php echo $member['new_post']['updated_date']?> </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <script>
                $('.main').html()
            </script>
        </div>
    </div>
</section>