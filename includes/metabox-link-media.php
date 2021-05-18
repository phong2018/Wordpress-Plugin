<?php 

/* GIAO DIỆN META */
/* *************************************** */
 
// Action tạo metabox
function create_metabox()
{
    add_meta_box('link-media', 'Link Media', 'show_metabox', 'post', 'advanced', 'high');
}
 
// hàm show metabox
function show_metabox($post, $metabox)
{
    // Lấy thông tin theo bài viết hiện tại
    $link_download = get_post_meta($post->ID, 'post_link_download', true);
    $link_demo = get_post_meta($post->ID, 'post_link_demo', true);
     
    // Tạo file Security Hidden
    wp_nonce_field(basename(__FILE__), 'post_media_metabox');
     
    ?>
    <p>
        <input type="text" value="<?php echo $link_download; ?>" name="post_link_download" /> Link Download
    </p>
    <p>
        <input type="text" value="<?php echo $link_demo; ?>" name="post_link_demo" /> Link Demo
    </p>
    <?php
}
 
// Bổ sung hàm create_metabõ vào action add_meta_boxes
add_action('add_meta_boxes', 'create_metabox');
 
/* LƯU META */
/* *************************************** */
 
// Hàm lưu thông tin metabox
function save_metabox($post_id, $post)
{
    // Kiểm tra input hidden bảo mật
    if (!wp_verify_nonce($_POST["post_media_metabox"], basename(__FILE__))) {
        return $post_id;
    }
         
    // Kiểm tra xem dữ liệu có không
    if (!isset($_POST["post_link_download"]) || !isset($_POST["post_link_demo"])) {
        return $post_id;
    }
     
    // Nếu auto save thì không làm gì cả
    if (defined("DOING_AUTOSAVE") && DOING_AUTOSAVE) {
        return $post_id;
    }
     
    // Vì metabox này dành cho Post nên phải kiểm tra có đúng vậy không?
    if ('post' != $post->post_type) {
        return $post_id;
    }
     
    // Tới đây là mọi thứ OK rồi, ta bắt đầu lưu thôi :)
    $link_download = (isset($_POST["post_link_download"])) ? $_POST["post_link_download"] : '';
    $link_demo = (isset($_POST["post_link_demo"])) ? $_POST["post_link_demo"] : '';
     
    // Cập nhật dữ liệu. Hàm này sẽ tạo mới nếu chưa có trong CSDL
    update_post_meta($post_id, "post_link_download", $link_download);
    update_post_meta($post_id, "post_link_demo", $link_demo);
}
 
// THêm hàm save_metabox vào action lưu bài viết
add_action('save_post', 'save_metabox', 10, 2);
 
 
/* XÓA META */
/* *************************************** */
// Hàm xóa metadata
function delete_metabox($post_id)
{
    delete_post_meta($post_id, 'post_link_download');
    delete_post_meta($post_id, 'post_link_demo');
}
 
 
// THêm hàm delete_metabox vào action xóa bài viết
add_action('delete_post', 'delete_metabox', 10);