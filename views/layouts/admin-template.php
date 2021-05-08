<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script language="javascript" src="https://code.jquery.com/jquery-2.0.0.min.js"></script>
    <title></title>
    <style>
        <?php
            include_once __DIR__ . '/../../public/css/styles.css';
            include_once __DIR__ . '/../../public/css/layout-admin-template.css';
        ?>
    </style>
</head>
<script>
    function highlightFocusBlock(){

        let location = window.location.pathname;
        let focusBlock = null;

        if(location.includes('users')) focusBlock = '#users-block'

        $(focusBlock).css('color', '#096dd9').prev().css('color', '#096dd9').parent().css('background', 'white');
    }
</script>
<body>
<header class="fixed-side-bar">
    <div class="admin-top">
        <div class="admin-logo">
            <img src="/logo.png"/>
        </div>
        <div class="admin-name">
            <p>CLOSURE ADMIN</p>
        </div>
    </div>
    <div class="side-bar-content">
        <a href="/admin/dashboard/users"><div class="side-bar-item">
            <i class="fas fa-atlas"></i>
            <p class="item-name" id="catalogs-block">Catalog Management</p>
        </div></a>
        <a href="/admin/dashboard/users"><div class="side-bar-item">
            <i class="fab fa-delicious"></i>
            <p class="item-name" id="tags-block">Tag Management</p>
        </div></a>
        <a href="/admin/dashboard/users"><div class="side-bar-item">
            <i class="fas fa-users"></i>
            <p class="item-name" id="users-block">User Management</p>
        </div></a>
            <a href="/admin/dashboard/users"><div class="side-bar-item">
            <i class="far fa-newspaper"></i>
            <p class="item-name" id="posts-block">Post Management</p>
        </div></a>
        <a href="/admin/dashboard/users"><div class="side-bar-item">
            <i class="fab fa-windows"></i>
            <p class="item-name" id="system-block">System Setting</p>
        </div></a>
        <a href="/admin/dashboard/users"><div class="side-bar-item">
            <i class="fab fa-chrome"></i>
            <p class="item-name" id="website-block">Website Setting</p>
        </div></a>
    </div>
</header>
<div class="container">
    <div class="admin-nav">
        <div class="left-side nav-item">
            <div class="admin-account nav-item">
                <img src="https://img.taplb.com/md5/0f/0f/0f0f5765ac987ce389826b6a675c3616/-_-/fit-in/1320x0/filters:quality(80):background_color(white):format(jpeg)"/>
                <p>John Henderson</p>
            </div>
            <div class="admin-notification nav-item">
                <div class="notification-item">
                    <i class="fas fa-exclamation-triangle"></i>
                    <div class="amount" style="background: #FAD839">6</div>
                </div>
                <div class="notification-item">
                    <i class="fas fa-envelope"></i>
                    <div class="amount" style="background: #00C0EF;">12</div>
                </div>
                <div class="notification-item">
                    <i class="fas fa-list"></i>
                    <div class="amount" style="background: #F56954;">24</div>
                </div>
            </div>
        </div>
        <div class="right-side nav-item">
            <div class="admin-chat nav-item">
                <i class="fas fa-sms"></i>
                <p>Chat</p>
                <div class="amount">24</div>
            </div>
            <div class="admin-logout nav-item">
                <p>Logout</p>
                <i class="fas fa-sign-out-alt"></i>
            </div>
        </div>
    </div>
    <div style="border-top: 1px solid #CCCCCC; margin: 24px 0; height: 1px;"></div>
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
        © 2021 Closure Admin
    </div>
</footer>
</body>
<script>
    highlightFocusBlock();
</script>
</html>
