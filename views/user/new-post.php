<style>
    <?php
        use app\core\mvc\Application;
        include_once Application::$ROOT_DIR."/public/css/$css";
    ?>
</style>
<!--<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>-->
<script src="//cdn.ckeditor.com/4.16.0/full/ckeditor.js"></script>
<script>
    function handleSelectCategory(){
        let catalogBlock = '.catalog-list .first-item';
        let selectCustomBlock = '.catalog-list .select-custom';
        $(catalogBlock).children('i').click(() => {
            if($(selectCustomBlock).css('display') === 'none'){
                $(selectCustomBlock).css('display', 'block');
            }else{
                $(selectCustomBlock).css('display', 'none');
            }
        });
        $(selectCustomBlock).click(() => {
            $(selectCustomBlock).css('display', 'none');
        });
    }
</script>
<section class="new-post">
    <div class="top-headline">
        <p>Đăng bài</p>
    </div>
    <div class="content">
        <form>
            <input name="headline" type="text" class="headline-input" placeholder="Nhập tựa đề để đăng bài mới "/>
            <div class="catalog-select">
                <p class="tutorial">Hãy lựa chọn loại câu hỏi cho bài viết của bạn </p>
                <div class="catalog-list">
                    <div class="first-item">
                        <p id="category-value">Laptop và PC</p>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="select-custom">
                        <p class="select-item">Friend & Love</p>
                        <p class="select-item">Young Party</p>
                        <p class="select-item">Tư Vấn & Chuyện Trò</p>
                        <p class="select-item">Phòng Truyện</p>
                        <p class="select-item">Kho Game</p>
                        <p class="select-item">Phổ thông</p>
                        <p class="select-item">Kỹ năng mềm</p>
                        <p class="select-item">Giới tính+</p>
                        <p class="select-item">Tin học bình dân</p>
                    </div>
                </div>
            </div>
            <div class="tag-select">
                <p class="tutorial">Hãy lựa tag cho bài viết của bạn hoặc tạo ra tag mới</p>
                <div class="tag-choose">
                    <input name="new-tag" type="text" class="add-tag-input" placeholder="Tag mới"/>
                    <button class="add-tag-btn">Thêm tag</button>
                </div>
                <div class="tag-list">
                    <button class="tag-btn">C</button>
                    <button class="tag-btn">C++</button>
                    <button class="tag-btn">Java</button>
                    <button class="tag-btn">PHP</button>
                    <button class="tag-btn">C#</button>
                    <button class="tag-btn">Spring</button>
                    <button class="tag-btn">Hibernate</button>
                    <button class="tag-btn">BA</button>
                    <button class="tag-btn">PM</button>
                    <button class="tag-btn">C</button>
                    <button class="tag-btn">C++</button>
                    <button class="tag-btn">Java</button>
                    <button class="tag-btn">PHP</button>
                    <button class="tag-btn">C#</button>
                    <button class="tag-btn">Spring</button>
                    <button class="tag-btn">Hibernate</button>
                    <button class="tag-btn">BA</button>
                    <button class="tag-btn">PM</button>
                    <button class="tag-btn">C</button>
                    <button class="tag-btn">C++</button>
                    <button class="tag-btn">Java</button>
                    <button class="tag-btn">PHP</button>
                    <button class="tag-btn">C#</button>
                    <button class="tag-btn">Spring</button>
                    <button class="tag-btn">Hibernate</button>
                    <button class="tag-btn">BA</button>
                    <button class="tag-btn">PM</button>
                </div>
            </div>
            <div class="post-content">
                <div class="introduce">
                    <p>Nhập nội dung bài đăng ở đây</p>
                </div>
                <textarea name="editor" placeholder="OK" id="editor"></textarea>
            </div>
            <button type="submit" class="submit-btn">Đăng bài</button>
        </form>
    </div>
    <script>
        CKEDITOR.replace( 'editor' )
            .config.toolbarCanCollapse = true;
        handleSelectCategory();
    </script>
</section>
