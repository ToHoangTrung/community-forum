<style>
    <?php
        use app\core\mvc\Application;
        include_once Application::$ROOT_DIR."/public/css/$css";
    ?>
</style>
<section class="admin-catalogs">
    <div class="top-headline">
        <p>List Catalogs of Forum</p>
    </div>
    <div class="content">
        <div class="main-table">
            <div class="table-nav">
                <div class="table-search">
                    <input placeholder="Looking for catalog?" class="search-input"/>
                    <button class="search-btn">Search</button>
                </div>
            </div>
            <div class="create-nav">
                <form action="" method="post">
                    <input placeholder="Input new catalog name here" name="name" type="text"/>
                    <textarea name="description"></textarea>
                    <button type="submit">Create New Catalog</button>
                </form>
            </div>
            <table>
                <thead>
                <tr>
                    <th width="5%">Id</th>
                    <th width="20%">Name</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ((array)$catalogs as $catalog) :?>
                    <tr>
                        <td><?php echo $catalog['id'] ?></td>
                        <td><?php echo $catalog['name'] ?></td>
                        <td><?php echo $catalog['description'] ?></td>
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
