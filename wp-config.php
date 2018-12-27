<?php
/**
 * Cấu hình cơ bản cho WordPress
 *
 * Trong quá trình cài đặt, file "wp-config.php" sẽ được tạo dựa trên nội dung 
 * mẫu của file này. Bạn không bắt buộc phải sử dụng giao diện web để cài đặt, 
 * chỉ cần lưu file này lại với tên "wp-config.php" và điền các thông tin cần thiết.
 *
 * File này chứa các thiết lập sau:
 *
 * * Thiết lập MySQL
 * * Các khóa bí mật
 * * Tiền tố cho các bảng database
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Thiết lập MySQL - Bạn có thể lấy các thông tin này từ host/server ** //
/** Tên database MySQL */
define('DB_NAME', 'wordpress');

/** Username của database */
define('DB_USER', 'root');

/** Mật khẩu của database */
define('DB_PASSWORD', '');

/** Hostname của database */
define('DB_HOST', 'localhost');

/** Database charset sử dụng để tạo bảng database. */
define('DB_CHARSET', 'utf8mb4');

/** Kiểu database collate. Đừng thay đổi nếu không hiểu rõ. */
define('DB_COLLATE', '');

/**#@+
 * Khóa xác thực và salt.
 *
 * Thay đổi các giá trị dưới đây thành các khóa không trùng nhau!
 * Bạn có thể tạo ra các khóa này bằng công cụ
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Bạn có thể thay đổi chúng bất cứ lúc nào để vô hiệu hóa tất cả
 * các cookie hiện có. Điều này sẽ buộc tất cả người dùng phải đăng nhập lại.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'HZ*;~Jt+bYGp_Dh0MJF@ln{SZg*:[UPC@XYz:@gRHkciH%T`}s27U4#A~%o{WwPs');
define('SECURE_AUTH_KEY',  ';IL?}V//|XD941$6H<I2X/wE^x %h!vk`6R@H%jRQOei^4/nkkg0anxEh^`#4g9f');
define('LOGGED_IN_KEY',    'l[mx,)6 l]#B],FL4liQTuJNZk^f{G+M7nMgVtPHwlNP4r-Qy6np$cB#i3zaD6.f');
define('NONCE_KEY',        'RCR_TAbv|qm)l;;#6%>D>KTL/]|qv`~OTaVedC8B<V#a9=Rp4esxdLptNlatSaO?');
define('AUTH_SALT',        'jn(Lo<TE,hv5$uDmhlm>4lyWYEQ.dM04ZI^OpU+6H-#KE}$rn@<;GK1BAsQdH4VO');
define('SECURE_AUTH_SALT', 'fdJaDBZj@ W;0EV)>H7 jB/H2QvhDaQqN<[mF$pqPgYOCX--tJ?%3iQUO%^?_5xh');
define('LOGGED_IN_SALT',   '=n<cXRW6Sl6xUo`Wi4Lw3OD1id2GvjY-Et5T?yL]=/wVjn}2QVTG^fB[&=l,i+Zo');
define('NONCE_SALT',       '<U@$05Fi4wEG)L~0ZH9Mw+~4z1(Ok3d7&:l=eG-h} <GX#q_9y;4%~ #wpcx-Bf4');
// define('WP_MEMORY_LIMIT', '256M');

/**#@-*/

/**
 * Tiền tố cho bảng database.
 *
 * Đặt tiền tố cho bảng giúp bạn có thể cài nhiều site WordPress vào cùng một database.
 * Chỉ sử dụng số, ký tự và dấu gạch dưới!
 */
$table_prefix  = 'wp_';

/**
 * Dành cho developer: Chế độ debug.
 *
 * Thay đổi hằng số này thành true sẽ làm hiện lên các thông báo trong quá trình phát triển.
 * Chúng tôi khuyến cáo các developer sử dụng WP_DEBUG trong quá trình phát triển plugin và theme.
 *
 * Để có thông tin về các hằng số khác có thể sử dụng khi debug, hãy xem tại Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Đó là tất cả thiết lập, ngưng sửa từ phần này trở xuống. Chúc bạn viết blog vui vẻ. */

/** Đường dẫn tuyệt đối đến thư mục cài đặt WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Thiết lập biến và include file. */
require_once(ABSPATH . 'wp-settings.php');
