<style>
    <?php

    use app\core\mvc\Application;

    include_once Application::$ROOT_DIR . "/public/css/$css";
    ?>
</style>
<section class="user-setting">
    <div class="row">
        <div class="grid-view1">
            <div class="side-bar">
                <!-- Professional Details -->
                <h5 class="tittle">User Profile</h5>
                <div class="user-image">
                    <?php
                        $imgUrl = Application::$app->user->image_url;
                        if ($imgUrl != null) : ?>
                            <img class="img-responsive" alt="" src=<?php echo Application::$PUBLIC_PATH . "/assets/image/user/" . Application::$app->user->image_url ?> />
                        <?php else : ?>
                            <p class="name-image"><?php echo strtoupper(Application::$app->user->username[0]) ?></p>
                    <?php endif; ?>
                </div>
                <ul class="personal-info">
                    <li>
                        <p> <span> Username</span> <?php echo $user['username'] ?> </p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="grid-view2">
            <div class="tab-content">

                <!-- ABOUT ME -->
                <div role="tabpanel" class="tab-pane fade in active" id="about-me">
                    <div class="inside-sec">
                        <!-- BIO AND SKILLS -->
                        <h5 class="tittle">About Me</h5>

                        <form action="" method="post">
                            <section class="about-me padding-top-10">

                                <!-- Personal Info -->
                                <ul class="personal-info">
                                    <li>
                                        <span> Name</span>
                                        <input type="text" name="name" value="<?php echo $user['name'] ?>"> </input>
                                    </li>
                                    <li>
                                        <span> Birthday</span>
                                        <input type="date" name="birthday" value=<?php echo $user['birthday'] ?>> </input>
                                    </li>
                                    <li>
                                        <span> Email</span>
                                        <input type="email" name="email" value="<?php echo $user['email'] ?>"> </input>
                                    </li>
                                    <li>
                                        <span> Gender </span>
                                        <select name="gender">
                                            <option value="0" <?php
                                                                if ($user['gender'] === "0")
                                                                    echo "Selected";
                                                                ?>>Nữ</option>
                                            <option value="1" <?php
                                                                if ($user['gender'] === "1")
                                                                    echo "Selected";
                                                                ?>>Nam</option>
                                        </select>
                                    </li>
                                </ul>
                            </section>
                            <div class="btn-update">
                                <button>Save</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>