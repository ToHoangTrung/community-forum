<style>
    <?php
        use app\core\mvc\Application;
        include_once Application::$ROOT_DIR."/public/css/$css";
    ?>
</style>
<div class="login">
    <script>

    </script>
    <?php
        if(!empty($error)) {
            ?>
            <div class="message-block failure">
                <?php echo $error ?>
            </div>
            <?php
        }
    ?>
    <div class="content">
        <div class="logo-block">
            <img src="/logo.png"/>
        </div>
        <div class="form-block">
            <p class="headline">Đăng nhập vào Closure Forum</p>
            <form action="" method="post">
                <input name="email" placeholder="Email" type="email"/>
                <input name="password" placeholder="Password" type="password"/>
                <button class="submit-btn">Đăng nhập ngay</button>
            </form>
            <p class="change-type">Bạn chưa có tài khoản ư, <a href="/register">Đăng ký ngay</a></p>
        </div>
    </div>
</div>
