<style type="text/css">
    <?php

    use app\core\mvc\Application;

    include_once Application::$ROOT_DIR . "/public/css/$css";
    ?>
</style>



<section class="user-profile">
    <div class="row">
        <div class="grid-view1">
            <div class="side-bar">
                <!-- Professional Details -->
                <h5 class="tittle">User Profile</h5>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="user-image">
                        <?php
                        $imgUrl = $user['image_url'];
                        if ($imgUrl != null) : ?>
                            <img class="img-responsive" alt="" src=<?php echo Application::$PUBLIC_PATH . "/assets/image/user/" . $user['image_url'] ?> />
                        <?php else : ?>
                            <p class="name-image"><?php echo strtoupper(Application::$app->user->username[0]) ?></p>
                        <?php endif; ?>
                        <input type="file" class="my_avatar" name="userfile">
                    </div>
                    <input type="submit" class="submit-avatar" value="change avatar">
                </form>
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


                        <section class="about-me padding-top-10">

                            <!-- Personal Info -->
                            <ul class="personal-info">
                                <li>
                                    <p> <span> Name</span> <?php echo $user['name'] ?> </p>
                                </li>
                                <li>
                                    <p> <span> Birthday</span> <?php echo $user['birthday'] ?> </p>
                                </li>
                                <li>
                                    <p> <span> Email</span> <?php echo $user['email'] ?> </p>
                                </li>
                                <li>
                                    <p> <span> Gender</span>
                                        <?php
                                        if ($user['gender'] === "0")
                                            echo "Nữ";
                                        if ($user['gender'] === "1")
                                            echo "Nam";
                                        ?> </p>
                                </li>
                            </ul>
                        </section>
                        <div class="btn-update">
                            <a href="/user/setting">Update</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>