<style>
    <?php
    include_once __DIR__ . "/../../public/css/layout-member-wall-introduce.css";
    use app\core\mvc\Application;
    ?>
</style>
<script>
    function highlightMemberFocusBlock() {
        let location = window.location.pathname;
        let focusBlock = null;
        if (location.includes('profile')) focusBlock = '#profile-block'
        else if (location.includes('activity')) focusBlock = '#activity-block'
        else if (location.includes('posts')) focusBlock = '#posts-block'
        else if (location.includes('about-me')) focusBlock = '#about-me-block'
        $(focusBlock).css({
            'background': '#0050b3',
            'color': 'white',
            'font-weight': 'bold'
        });
    }
</script>
<section class="member-wall-introduce">
    <div class="member-introduce">
        <div class="member-logo">
            <?php
                $imgUrl = $GLOBALS['globaluser']['image_url'];
                if ($imgUrl != null) : ?>
                    <img class="img-responsive" alt="" src=<?php echo Application::$PUBLIC_PATH . "/assets/image/user/" . $GLOBALS['globaluser']['image_url'] ?> />
                <?php else : ?>
                    <p class="name-image"><?php echo strtoupper($GLOBALS['globaluser']['username'][0]) ?></p>
            <?php endif; ?>
        </div>
        <div class="basic-info">
            <a href="/" class="member-name"><?php echo $GLOBALS['globaluser']['username'] ?></a>
            <a href="/" class="member-rank">Senior Member</a>
        </div>
        <hr style="border-top:1px solid #CCCCCC" />
        <div class="member-post-info">
            <div class="info-item">
                <p class="label">Bài viết</p>
                <p class="text"><?php echo $GLOBALS['globaluser']['totalpost'] ?></p>
            </div>
            <div class="info-item">
                <p class="label">Tương tác</p>
                <p class="text"><?php echo $GLOBALS['globaluser']['totalcomment'] ?></p>
            </div>
            <div class="info-item">
                <p class="label">Điểm</p>
                <p class="text">0</p>
            </div>
        </div>
        <hr style="border-top:1px solid #CCCCCC; margin: 0 10px 0 20%;" />
        <div class="member-contact">
            <a class="contact-item" href="#">Quan tâm</a>
            <a class="contact-item" href="#">Chặn</a>
            <a class="contact-item" href="#" style="margin-left: 10px">Nhắn tin</a>
            <a class="contact-item" href="#">Tìm<i class="fas fa-chevron-down" style="margin-left: 5px"></i></a>
        </div>
    </div>
    <div class="member-nav">
        <a href="/members/profile?id=<?php echo $GLOBALS['globaluser']['id']?>" class="nav-link" id="profile-block">Tường nhà</a>
        <a href="/member/activity" class="nav-link" id="activity-block"></a>
        <a href="/members/posts?id=<?php echo $GLOBALS['globaluser']['id']?>" class="nav-link" id="posts-block">Bài viết</a>
        <a href="/member/about-me" class="nav-link" id="about-me-block"></a>
    </div>
</section>
<script>
    highlightMemberFocusBlock();
</script>
