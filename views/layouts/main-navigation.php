<style>
    <?php
        include_once __DIR__ . "/../../public/css/layout-main-navigation.css";
    ?>
</style>
<script>
    function highlightFocusBlock(){
        let location = window.location.pathname;
        let focusBlock = null;
        if(location.length === 1) focusBlock = '#home-block'
        else if(location.includes('forum')) focusBlock = '#forum-block'
        else if(location.includes('members')) focusBlock = '#members-block'
        $(focusBlock).css('background','white').css('color', '#096dd9');
    }
    function handleOpenDropdownService() {
        let mainBlock = '.main-dropdown';
        $(mainBlock).click(function () {
            $(mainBlock).not(this).next().next('.dropdown-service').slideUp();
            $(mainBlock).not(this).next('.arrow-up').hide();
            $(this).next().next('.dropdown-service').slideToggle();
            $(this).next('.arrow-up').toggle();
        });
    }
</script>
<section class="main-navigation">
    <div class="category-block service-block">
        <a href="/" class="category-link nav-link" id="home-block">TRANG CHỦ</a>
        <a href="/forum/posts" class="category-link nav-link" id="forum-block">DIỄN ĐÀN</a>
        <a href="/" class="category-link nav-link" id="">LAN MAN</a>
        <a href="/members" class="category-link nav-link" id="members-block">THÀNH VIÊN</a>
    </div>
    <div class="user-block service-block">
        <?php
        use app\core\mvc\Application;
        if (Application::isGuest()): ?>
            <div class="not-sign-in-block">
                <a href="/login" class="user-link nav-link">Đăng nhập</a>
                <a href="/register" class="user-link nav-link">Đăng ký</a>
            </div>
        <?php else: ?>
            <div class="sign-in-block">
                <div class="user-display">
                    <div class="user-logo nav-link main-dropdown">
                        <?php
                            $imgUrl = Application::$app->user->image_url;
                            if($imgUrl != null): ?>
                                <img src=<?php echo Application::$PUBLIC_PATH."/assets/image/user/".Application::$app->user->image_url ?>/>
                            <?php else: ?>
                                <p class="name-image"><?php echo strtoupper(Application::$app->user->username[0]) ?></p>
                            <?php endif; ?>
                        <p class="user-name"><?php echo Application::$app->user->username?></p>
                    </div>
                    <div class="arrow-up"></div>
                    <div class="dropdown-user-service dropdown-service">
                        <div class="dropdown-header">
                            <button id="account-block">Tài khoản</button>
                            <button id="bookmarks-block">Bookmarks</button>
                        </div>
                        <div class="dropdown-content">
                            <div class="account-block">
                                <div class="service-content" style="background: white">
                                    <div class="user-introduce">
                                        <div class="user-small-logo">
                                            <?php
                                                $imgUrl = Application::$app->user->image_url;
                                                if($imgUrl != null): ?>
                                                    <img src=<?php echo Application::$PUBLIC_PATH."/assets/image/user/".Application::$app->user->image_url ?>/>
                                                <?php else: ?>
                                                    <p class="name-image"><?php echo strtoupper(Application::$app->user->username[0]) ?></p>
                                            <?php endif; ?>
                                        </div>
                                        <div class="basic-info">
                                            <a href="/" class="user-name"><?php echo Application::$app->user->username?></a>
                                            <p>Thành viên mới</p>
                                            <p class="other-info">Bài viết<span>0</span></p>
                                            <p class="other-info">Tương tác<span>0</span></p>
                                            <p class="other-info">Kinh nghiệm<span>0</span></p>
                                        </div>
                                    </div>
                                    <div class="service-item">
                                        <a href="/">News feed</a>
                                        <a href="/">Tương tác đã nhận </a>
                                        <a href="/">Bài của tôi</a>
                                    </div>
                                    <div style="border-top: 1px solid #DFDFDF; margin: 0 14px; height: 1px;"></div>
                                    <div class="service-item">
                                        <a href="/">Thông tin cá nhân</a>
                                        <a href="/">Chữ ký</a>
                                        <a href="/">Mật khẩu và bảo mật</a>
                                        <a href="/">Liên kết tài khoản</a>
                                        <a href="/">Riêng tư</a>
                                        <a href="/">Đang quan tâm</a>
                                        <a href="/">Tùy chọn</a>
                                        <a href="/">Chặn</a>
                                    </div>
                                    <div style="border-top: 1px solid #DFDFDF; margin: 0 14px; height: 1px"></div>
                                    <div class="service-item">
                                        <a href="/logout">Đăng xuất</a>
                                    </div>
                                </div>
                                <div class="quick-status-post">
                                    <input placeholder="Hôm nay" class="status-input"/>
                                    <button class="submit-btn"><i class="fas fa-reply"></i>Đăng</button>
                                </div>
                                <script>
                                    $('.quick-status-post .status-input').focus(() => {
                                        $('.quick-status-post .submit-btn').slideToggle();
                                    });
                                </script>
                            </div>
                            <div class="bookmarks-block">
                                <div class="quick-bookmarks-search">
                                    <input placeholder="Lọc theo nhãn" class="bookmarks-input"/>
                                </div>
                                <div class="bookmarks-list">
                                    <p>Bạn chưa lưu nội dung nào</p>
                                </div>
                                <div class="more-link">
                                    <a href="/">Xem thêm...</a>
                                </div>
                            </div>
                        </div>
                        <script>
                            function changeFocusQuickUserService(){
                                $('#account-block').click(function (){
                                    $(this).css('border-bottom', '3px solid #096dd9');
                                    $('#bookmarks-block').css('border-bottom', '3px solid transparent');
                                    $('.bookmarks-block').hide();
                                    $('.account-block').show();
                                });
                                $('#bookmarks-block').click(function (){
                                    $(this).css('border-bottom', '3px solid #096dd9');
                                    $('#account-block').css('border-bottom', '3px solid transparent');
                                    $('.account-block').hide();
                                    $('.bookmarks-block').show();
                                });
                            }
                            changeFocusQuickUserService();
                        </script>
                    </div>
                </div>
                <div class="user-service">
                    <div class="user-service-item">
                        <button class="user-link nav-link main-dropdown"><i class="far fa-bell"></i></button>
                        <div class="arrow-up"></div>
                        <div class="dropdown-notification-service dropdown-service">
                            <div class="dropdown-header">
                                <p>Thông báo</p>
                            </div>
                            <div class="dropdown-content">
                                <p>Bạn không có thông báo mới nào</p>
                            </div>
                            <div class="dropdown-footer">
                                <a href="/">Xem thêm...</a>
                            </div>
                        </div>
                    </div>
                    <div class="user-service-item">
                        <button class="user-link nav-link main-dropdown"><i class="far fa-envelope"></i></button>
                        <div class="arrow-up"></div>
                        <div class="dropdown-mail-service dropdown-service">
                            <div class="dropdown-header">
                                <p>Tin nhắn</p>
                            </div>
                            <div class="dropdown-content">
                                <p>Bạn không có tin nhắn mới nào</p>
                            </div>
                            <div class="dropdown-footer">
                                <a href="/">Xem thêm...</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <div class="search-block service-block">
        <div class="search-service">
            <button class="search-link nav-link main-dropdown"><i class="fas fa-search" style="margin-right: 10px"></i>Tìm kiếm</button>
            <div class="arrow-up"></div>
            <div class="dropdown-search-service dropdown-service">
                <div class="dropdown-header">
                    <p>Tìm kiếm</p>
                </div>
                <div class="dropdown-content">
                    <div class="quick-info-search">
                        <input placeholder="Tìm kiếm..." class="search-input"/>
                    </div>
                </div>
                <div class="dropdown-footer">
                    <a href="/">Search</a>
                    <a href="/">Advanced Search</a>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    highlightFocusBlock();
    handleOpenDropdownService();
</script>