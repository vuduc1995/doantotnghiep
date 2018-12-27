<?php

/*
 * Plugin Name: My Crawler
 * Plugin URI:  
 * Description: My Crawler dùng để tự động lấy bài viết trên các trang web về
 * Author:      Tuyết
 * Author URI:  
 * Version:     1.0.0
 * Text Domain: my-crawler
 * Domain Path: 
 * License:     GPL v2 or later
 */

include('simple_html_dom.php');
include('db-connection.php');

include('securitydaily-net.php');
include('thehackernews-com.php');
include('antoanthongtin-vn.php');

add_action( 'mycrawler_securitydaily_net', 'securitydaily');
add_action( 'mycrawler_thehackernews_com', 'thehackernews');
add_action( 'mycrawler_antoanthongtin_vn', 'antoanthongtin');
add_action( 'mycrawler_old_draft_auto_delete', 'old_draft_delete');

?>
