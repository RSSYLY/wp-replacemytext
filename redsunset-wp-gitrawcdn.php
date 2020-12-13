<?php
/*
Plugin Name: redsunset-wp-gitrawcdn
Plugin URI: https://github.com/RSSYLY/redsunset-wp-gitrawcdn
Description: 将关于githubraw的资源切换为加速cdn源
Version: 1.0.1
Author: XinzhiWang
Author URI: http://666old666.cn
*/


// When Loading Activate the plug-in execute set_Ray_options() function
register_activation_hook(__FILE__,'set_rssgitcdn_options');
 
require_once(dirname(__FILE__).'/includes/adminUI.php'); // 调用加载插件设置页面
 
 
// When Deactivate the plug-in execute unset_Ray_options() function
register_deactivation_hook(__FILE__,'unset__options');	
function replace_text_wps($text){
$replace = array(
'raw.githubusercontent.com' => get_option('rssgitcdn_cdnurl'), 
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
