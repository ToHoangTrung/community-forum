<style>
    <?php
        use app\core\mvc\Application;
        include_once Application::$ROOT_DIR."/public/css/$css";
    ?>
</style>
<section class="admin-reports">
    <div class="top-headline">
        <p>Newest Updated Reports</p>
    </div>
    <div class="content">
        <div class="main-table">
            <div class="table-nav">
                <div class="table-search">
                    <input placeholder="Looking for some report?" class="search-input"/>
                    <button class="search-btn">Search</button>
                </div>
            </div>
            <table>
                <thead>
                <tr>
                    <th>Post</th>
                    <th width="10%">User Report</th>
                    <th>Report</th>
                    <th width="15%">Created Date</th>
                    <th width="10%">Action</th>
                </tr>
                </thead>
                <?php
                foreach ((array)$reports as $report) :?>
                    <tr>
                        <td style="max-width: 300px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"><?php echo $report['post']['headline'] ?></td>
                        <td><?php echo $report['user']['username'] ?></td>
                        <td style="max-width: 300px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"><?php echo $report['content'] ?></td>
                        <td><?php echo $report['created_date'] ?></td>
                        <td class="action-list">
                            <a href="<?php echo '/admin/dashboard/reports/info?id='.$report['id'] ?>"><i class="fas fa-info"></i><p>Detail</p></a>
                        </td>
                    </tr>
                <?php endforeach;?>
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
