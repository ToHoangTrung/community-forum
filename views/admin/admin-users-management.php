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
                <div class="table-new">
                    <a href="#" class="new-btn">Create New User</a>
                </div>
            </div>
            <table>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Status/Role</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>To Hoang Trung</td>
                    <td>hoangtrung14121412@gmail.com</td>
                    <td>ok1234</td>
                    <td>Admin/Disabled</td>
                    <td class="action-list">
                        <a href="/"><i class="fas fa-edit"></i><p>Edit</p></a>
                        <a href="/"><i class="fas fa-info"></i><p>Profile</p></a>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>To Hoang Trung</td>
                    <td>hoangtrung14121412@gmail.com</td>
                    <td>ok1234</td>
                    <td>Admin/Disabled</td>
                    <td class="action-list">
                        <a href="/"><i class="fas fa-edit"></i><p>Edit</p></a>
                        <a href="/"><i class="fas fa-info"></i><p>Profile</p></a>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>To Hoang Trung</td>
                    <td>hoangtrung14121412@gmail.com</td>
                    <td>ok1234</td>
                    <td>Admin/Disabled</td>
                    <td class="action-list">
                        <a href="/"><i class="fas fa-edit"></i><p>Edit</p></a>
                        <a href="/"><i class="fas fa-info"></i><p>Profile</p></a>
                    </td>
                </tr>
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