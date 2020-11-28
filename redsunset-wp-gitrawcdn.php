<?php
/*
Plugin Name: redsunset-wp-gitrawcdn
Plugin URI: https://github.com/RSSYLY/redsunset-wp-gitrawcdn
Description: 将关于githubraw的资源切换为加速cdn源
Version: 1.0.0
Author: XinzhiWang
Author URI: http://666old666.cn
*/

function replace_text_wps($text){
$replace = array(
'raw.githubusercontent.com' => 'raw.sevencdn.com', 
    );
$text = str_replace(array_keys($replace), $replace, $text);
return $text;
}
/*WP回调函数
具体请查看WP文档*/
add_filter('the_content', 'replace_text_wps');
add_filter('the_excerpt', 'replace_text_wps');
add_filter('the_content_feed', 'replace_text_wps');
add_filter('wp_get_attachment_url', 'replace_text_wps');
?>