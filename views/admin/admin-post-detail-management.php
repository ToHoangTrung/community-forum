<style>
    <?php
        use app\core\mvc\Application;
        include_once Application::$ROOT_DIR."/public/css/$css";
    ?>
</style>
<section class="admin-post-detail">
    <div class="top-headline">
        <p>Post Detail: <?php echo $post['headline'] ?></p>
    </div>
    <div class="content">
        <div class="detail-nav">
            <div class="left">
                <a href="/admin/dashboard">Display Comment</a>
                <a href="/admin/dashboard/reports/post">Display Report</a>
            </div>
            <div class="right">
                <div class="custom-select">
                    <select class="status-select">
                        <option selected disabled>Select Status</option>
                        <option value="APPROVED">Approve</option>
                        <option value="NOT APPROVED">Not Approve</option>
                        <option value="DISABLE">Disable</option>
                    </select>
                </div>
                <button class="update-btn">Update Status</button>
            </div>
        </div>
        <div class="detail-content">
            <div class="detail-info">
                <div class="detail-info-item">
                    <p class="title">Headline</p><p class="info"><?php echo $post['headline'] ?></p>
                </div>
                <div class="detail-info-item">
                    <p class="title">Author</p><a class="info" href="<?php echo '/admin/dashboard/users/info?id='.$post['user']['id'] ?>"><?php echo $post['user']['username'] ?></a>
                </div>
                <div class="detail-info-item">
                    <p class="title">Catalog</p><a class="info"  href="<?php echo '/admin/dashboard/catalogs/info?id='.$post['catalog']['id'] ?>"><?php echo $post['catalog']['name'] ?></a>
                </div>
                <div class="detail-info-item">
                    <p class="title">Created Date</p><p class="info"><?php echo $post['created_date'] ?></p>
                </div>
                <div class="detail-info-item">
                    <p class="title post-status">Status</p><p class="info"><?php echo $post['status'] ?></p>
                </div>
                <div class="detail-info-item">
                    <p class="title">Tags</p>
                    <div class="post-tags-list info">
                        <?php
                        foreach ((array)$post['tags'] as $tag) :?>
                            <a href="<?php echo '/admin/dashboard/tags/info?id='.$tag['id'] ?>"><?php echo $tag['name'] ?></a>
                        <?php endforeach;?>
                    </div>
                </div>
                <div class="content">
                    <div class="show-hide-btn">
                        <button>Show/Hide Content</button>
                        <button>Show/Hide Comment</button>
                        <button>Show/Hide Report</button>
                    </div>
                    <div class="info">
                        <div class="info-block" style="display: none">
                            <?php echo $content ?>
                        </div>
                        <div class="info-block comment">
                            <?php
                            foreach ((array)$post['comments'] as $comment) :?>
                                <div class="info-item">
                                    <div class="user-info">
                                        User comment
                                    </div>
                                    <div class="content-info">
                                        <?php echo $comment['content'] ?>
                                    </div>
                                </div>
                            <?php endforeach;?>
                        </div>
                        <div class="info-block report" style="display: none">
                            <?php
                            foreach ((array)$post['tags'] as $tag) :?>
                                <div class="info-item">
                                    <div class="user-info">User comment</div>
                                    <div class="content-info"><?php echo $post['headline'] ?></div>
                                </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('.update-btn').click(function () {
            let status = $('.status-select').val();
            let postId = "<?php echo $post['id'] ?>"
            $.ajax({
                type: "POST",
                url: 'http://localhost:8080/admin/dashboard/posts/info',
                dataType: 'json',
                data: {
                    postId: postId,
                    status: status
                },
                success: function (e) {
                    location.reload()
                }
            });
        })
    </script>
</section>
