<style>
    <?php
        use app\core\mvc\Application;
        include_once Application::$ROOT_DIR."/public/css/$css";
    ?>
</style>
<div class="admin-login">
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
            <p class="headline">Closure Community Forum Admin Login</p>
            <form action="" method="post">
                <input name="email" placeholder="Email" type="email"/>
                <input name="password" placeholder="Password" type="password"/>
                <button class="submit-btn">Login</button>
            </form>
        </div>
    </div>
</div>
