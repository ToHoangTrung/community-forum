<style>
    <?php
        use app\core\mvc\Application;
        include_once Application::$ROOT_DIR."/public/css/$css";
    ?>
</style>
<section class="admin-user-detail">
    <div class="top-headline">
        <?php
        if ($user['is_admin'] == 1): ?>
            <p>Admin Detail: <?php echo $user['username'] ?></p>
        <?php else: ?>
            <p>User Detail: <?php echo $user['username'] ?></p>
        <?php endif; ?>
    </div>
    <div class="content">
        <div class="detail-nav">
            <?php
            if ($user['is_admin'] == 0): ?>
                <div class="right">
                    <div class="custom-select">
                        <select class="permission-select">
                            <option selected disabled>Add/Remove Permission</option>
                            <option value="1">Comment Permission</option>
                            <option value="2">Post Permission</option>
                            <option value="3">Like Permission</option>
                        </select>
                    </div>
                    <button class="update-btn" value="INSERT">Add Permission</button>
                    <button class="update-btn" value="DELETE">Remove Permission</button>
                </div>
            <?php else: ?>
            <?php endif; ?>
        </div>
        <div class="detail-content">
            <div class="detail-info">
                <div class="detail-info-item">
                    <p class="title">Avatar</p>
                    <div class="avatar info">
                        <img src="<?php echo '/assets/image/user/'.$user['image_url'] ?>"/>
                    </div>
                </div>
                <div class="detail-info-item">
                    <p class="title">Name</p><p class="info"><?php echo $user['name'] ?></p>
                </div>
                <div class="detail-info-item">
                    <p class="title">Username</p><p class="info"><?php echo $user['username'] ?></p>
                </div>
                <div class="detail-info-item">
                    <p class="title">Email</p><p class="info"><?php echo $user['email'] ?></p>
                </div>
                <div class="detail-info-item">
                    <p class="title">BirthDay</p><p class="info"><?php echo $user['birthday'] ?></p>
                </div>
                <div class="detail-info-item">
                    <p class="title gender">Gender</p><p class="info"><?php echo $user['gender'] ?></p>
                </div>
                <div class="detail-info-item">
                    <p class="title">Permission</p>
                    <div class="user-permission-list info">
                        <?php
                        foreach ((array)$user['permissions'] as $permission) :?>
                            <a href="/"><?php echo $permission['name'] ?></a>
                        <?php endforeach;?>
                    </div>
                </div>
                <div class="detail-info-item">
                    <p class="title">Created Posts</p>
                    <div class="user-post-list info">
                        <?php
                        foreach ((array)$user['posts'] as $post) :?>
                            <a href="<?php echo '/admin/dashboard/posts/info?id='.$post['id'] ?>"><?php echo $post['headline'] ?></a>
                        <?php endforeach;?>
                    </div>
                </div>
                <script>
                    if ($('.gender').html() === "1") {
                        $('.gender').next().html("Male");
                    } else {
                        $('.gender').next().html("Female");
                    }
                </script>
            </div>
        </div>
    </div>
    <script>
        $('.update-btn').click(function () {
            let permission = $('.permission-select').val();
            let status = $(this).val();
            let userId = "<?php echo $user['id'] ?>"
             $.ajax({
                 type: "POST",
                 url: 'http://localhost:8081/admin/dashboard/users/info',
                 dataType: 'json',
                 data: {
                     userId: userId,
                     permission: permission,
                     status: status
                 },
                 success: function (e) {
                     // console.log(e)
                     location.reload()
                 }
             });
          })
    </script>
</section>
