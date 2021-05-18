<?php
// Hàm bổ sung chữ freetuts.net vào chuỗi
function add_string_to_title( $title111)
{
    //echo 'vvvvvvvvvv';
    return  ''.$title111 ;
}
 
// Đưa hàm add_string_to_title vào hook filter the_title
add_filter('the_title', 'add_string_to_title', 10, 1);
?>