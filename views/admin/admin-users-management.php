<style>
    <?php
        use app\core\mvc\Application;
        include_once Application::$ROOT_DIR."/public/css/$css";
    ?>
</style>
<section class="admin-users">
    <div class="top-headline">
        <p>List User of Forum</p>
    </div>
    <div class="content">
        <div class="main-table">
            <div class="table-nav">
                <div class="table-search">
                    <input placeholder="Looking for someone?" class="search-input"/>
                    <button class="search-btn">Search</button>
                </div>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Status/Role</th>
                        <th width="10%">Action</th>
                    </tr>
                </thead>
                <?php
                foreach ((array)$users as $user) :?>
                    <tr>
                        <td><?php echo $user['id'] ?></td>
                        <td><?php echo $user['name'] ?></td>
                        <td><?php echo $user['email'] ?></td>
                        <td><?php echo $user['username'] ?></td>
                        <td class="user-role"><?php echo $user['is_admin'] ?></td>
                        <td class="action-list">
                            <a href="<?php echo '/admin/dashboard/users/info?id='.$user['id'] ?>"><i class="fas fa-info"></i><p>Detail</p></a>
                        </td>
                    </tr>
                <?php endforeach;?>
                <script>
                    $('.user-role').map(function () {
                        if ($(this).html() === "1") {
                            $(this).html("Admin");
                        } else {
                            $(this).html("User");
                        }
                    })
                </script>
            </table>
            <div class="table-footer">
                <div class="table-pagination">
                    <a href="#"><i class="fas fa-chevron-left" style="margin-right: 10px"></i>Previous</a>
                    <a href="#">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#">Next<i class="fas fa-chevron-right" style="margin-left: 10px"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
