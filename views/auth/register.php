<style>
    <?php
        use app\core\mvc\Application;
        include_once Application::$ROOT_DIR."/public/css/$css";
    ?>
</style>
<div class="login">
    <?php
    if(!empty($error)) {
        ?>
        <div class="message-block failure">
            <?php echo $error ?>
        </div>
        <?php
    }
    else if(!empty($message)){
        ?>
        <div class="message-block success">
            <?php echo $message ?>
        </div>
        <?php
    }
    ?>
    <div class="content">
        <div class="logo-block">
            <img src="/logo.png"/>
        </div>
        <div class="form-block">
            <p class="headline">Đăng ký tài khoản mới</p>
            <form action="" method="post">
                <input name="email" placeholder="Email" type="email" />
                <input name="username" placeholder="Username" type="username"/>
                <input name="password" placeholder="Password" type="password"/>
                <input name="confirm-password" placeholder="Password confirm" type="password"/>
                <button class="submit-btn">Đăng ký ngay</button>
            </form>
            <p class="change-type">Bạn đã có tài khoản rồi ư <a href="/login">Đăng nhập ngay</a></p>
        </div>
    </div>
</div>