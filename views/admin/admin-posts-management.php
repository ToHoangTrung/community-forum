<style>
    <?php
        use app\core\mvc\Application;
        include_once Application::$ROOT_DIR."/public/css/$css";
    ?>
</style>
<section class="admin-posts">
    <div class="top-headline">
        <p>List Posts Of User</p>
    </div>
    <div class="content">
        <div class="main-table">
            <div class="table-nav">
                <div class="table-search">
                    <input placeholder="Looking for somepost?" class="search-input"/>
                    <button class="search-btn">Search</button>
                </div>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th width="40%">Headline</th>
                        <th>Catalog</th>
                        <th>Author</th>
                        <th>Status</th>
                        <th width="10%">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach ((array)$posts as $post) :?>
                    <tr>
                        <td><?php echo $post['id'] ?></td>
                        <td><?php echo $post['headline'] ?></td>
                        <td><?php echo $post['catalog']['name'] ?></td>
                        <td><?php echo $post['user']['username'] ?></td>
                        <td><?php echo $post['status'] ?></td>
                        <td class="action-list">
                            <a href="<?php echo '/admin/dashboard/posts/info?id='.$post['id'] ?>"><i class="fas fa-info"></i><p>Detail</p></a>
                        </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
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
