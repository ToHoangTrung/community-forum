<style>
    <?php
        use app\core\mvc\Application;
        include_once Application::$ROOT_DIR."/public/css/$css";
    ?>
</style>
<section class="admin-report-detail">
    <div class="top-headline">
        <p>Report Detail for Post: <?php echo $report['post']['headline'] ?></p>
    </div>
    <div class="content">
        <div class="detail-content">
            <div class="detail-info">
                <div class="detail-info-item">
                    <p class="title">Post Reported</p><a class="info" href="<?php echo '/admin/dashboard/posts/info?id='.$report['post_id'] ?>"><?php echo $report['post']['headline'] ?></a>
                </div>
                <div class="detail-info-item">
                    <p class="title">Author</p><a class="info" href="<?php echo '/admin/dashboard/users/info?id='.$report['post']['user_id'] ?>"><?php echo $report['post']['user']['username'] ?></a>
                </div>
                <div class="detail-info-item">
                    <p class="title">User Report</p><a class="info" href="<?php echo '/admin/dashboard/users/info?id='.$report['user_id'] ?>"><?php echo $report['user']['username'] ?></a>
                </div>
                <div class="detail-info-item">
                    <p class="title">Report Content</p><p class="info"><?php echo $report['content'] ?></p>
                </div>
                <div class="detail-info-item">
                    <p class="title">Report Day</p><p class="info"><?php echo $report['created_date'] ?></p>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('.update-btn').click(function () {
            let status = $(this).val() === "0" ? "DENIED" : "ACCEPT"
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
