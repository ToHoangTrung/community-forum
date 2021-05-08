<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script language="javascript" src="https://code.jquery.com/jquery-2.0.0.min.js"></script>
    <link rel="icon" href="/logo.png">
    <title></title>
    <style>
        <?php
            include_once __DIR__ . '/../../public/css/styles.css';
            include_once __DIR__ . '/../../public/css/layout-default-template.css';
            ?>
    </style>
    <script>
        function changeLayoutIfUserPage(){
            let location = window.location.pathname;

            if(location.includes('user') || location.includes('members/')){
                $('.nav .top-nav').css('display', 'none');
                $('.nav .bottom-nav').css('display', 'none');
                $('.container .page-path').css('display', 'none');
            }else{
                $('.member-block').css('display', 'none');
            }
            console.log(location)
        }
    </script>
</head>
<body>
<header class="nav">
    <div class="top-nav">
        <img src="/logo.png" class="web-logo"/>
        <div class="web-name">CLOSURE FORUM</div>
    </div>
    <div class="middle-nav"">
        <?php include __DIR__ . '/../../views/layouts/main-navigation.php' ?>
    </div>
    <div class="bottom-nav">
        <a href="/" class="nav-link">Bình luận mới</a>
        <a href="/" class="nav-link">Tìm bài viết</a>
        <a href="/" class="nav-link">Theo dõi</a>
    </div>
</header>
<div class="member-block">
    <?php include __DIR__ . '/../../views/layouts/member-wall-introduce.php' ?>
</div>
<div class="container">
    <div class="page-path">
        <i class="fas fa-home"></i>
        <a href="/">Home</a>
    </div>
    <div class="container-content">
        {{content}}
    </div>
</div>
<footer class="footer">
    <div class="content">
        <div class="item-block about">
            <p class="headline">ABOUT</p>
            <div class="info">
                But we wish we can do more. Given that Bootstrap 4 is one of the most useful design frameworks to build a website, and there are way too many Bootstrap 4 footer template available nowadays that may cost you much time to choose a suitable one, so we have put together 30 of the best Bootstrap 4 footer templates and you can certainly use them in your next projects.
            </div>
        </div>
        <div class="item-block category">
            <p class="headline">CATEGORY</p>
            <div class="info">
                <a href="/">C</a>
                <a href="/">UI Design</a>
                <a href="/">PHP</a>
                <a href="/">Java</a>
                <a href="/">Android</a>
                <a href="/">Template</a>
            </div>
        </div>
        <div class="item-block quick-links">
            <p class="headline">QUICK LINKS</p>
            <div class="info">
                <a href="/">About us</a>
                <a href="/">Contact us</a>
                <a href="/">Contribute</a>
                <a href="/">Privacy Policy</a>
                <a href="/">Sitemap</a>
            </div>
        </div>
    </div>
    <div class="bottom-footer">
        <hr/>
        <div class="info">
            <p>Forum software by XenForo® © 2010-2020 XenForo Ltd.</p>
        </div>
    </div>
</footer>
</body>
<script>
    changeLayoutIfUserPage();
</script>
</html>
