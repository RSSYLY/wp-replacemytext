<?php
/*
Plugin Name: wp-replacemytext全局文本替换
Plugin URI: https://github.com/RSSYLY/redsunset-wp-gitrawcdn
Description: 在不修改数据库的前提下替换文章中的链接
Version: 1.0.4
Author: XinzhiWang
Author URI: http://666old666.cn
*/


// 激活钩子，安装时，触发 函数unset_replacemytext_options
register_activation_hook(__FILE__, 'set_replacemytext_options');


require_once(dirname(__FILE__).'/includes/adminUI.php'); // 调用加载插件设置页面

// 禁用钩子，禁用插件时触发
register_deactivation_hook(__FILE__, 'unset_replacemytext_options');


// 替换文本
function replace_text_wps($text)
{
    $replace = array(
        get_option('replacemytext_myurl') => get_option('replacemytext_cdnurl'),

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
