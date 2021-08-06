<?php
// Add the plugin Settings page in the menu
add_action('admin_menu', 'create_admin_page');
// create admin page
function create_admin_page()
{
    add_options_page('ReplaceMyText全局文本替换', 'ReplaceMyText', 'manage_options', 'wp-replacemytext_options', 'replacemytext_options_page');
}
// 添加设置项
function set_replacemytext_options()
{
    add_option('replacemytext_myurl', 'raw.githubusercontent.com');
    add_option('replacemytext_cdnurl', 'raw.sevencdn.com');
}
// 删除设置
function unset_replacemytext_options()
{
    delete_option('replacemytext_cdnurl');
    delete_option('replacemytext_myurl');
}
// The plugin Settings page content
function replacemytext_options_page()
{ ?>
    <div class="wrap">
                <h1>设置</h1><br>
        <?php update_replacemytext_options();    // update Ray_color
        ?>
        <form method="post">
            <label>将网址</label>
            <input class="regular-text code" type="text" name="replacemytext_myurl" value="<?php echo get_option('replacemytext_myurl'); ?>" />
            <label>替换为</label>
            <input class="regular-text code" type="text" name="replacemytext_cdnurl" value="<?php echo get_option('replacemytext_cdnurl'); ?>" />
            <input class="button button-primary" type="submit" name="submit" value="保存设置" />
        </form>
    </div>
    <p>△使用说明
        本插件目前仅对 raw.githubusercontent.com 生效，请您确保您的媒体文件url为 raw.githubusercontent.com 开头
        您需要将可用的Github raw CDN域名填入上方表单中
        目前可用的Github CDN
        <br>
        raw.sevencdn.com<br>imgold.666old666.cn
    </p>
<?php
}
// update Ray_color option
function update_replacemytext_options()
{
    if ($_POST['submit']) {
        $flag = false;
        if ($_POST['replacemytext_cdnurl']) {
            //echo "die";exit;
            update_option('replacemytext_cdnurl', $_POST['replacemytext_cdnurl']);
            $flag = true;
        }
        if ($_POST['replacemytext_myurl']) {
            //echo "die";exit;
            update_option('replacemytext_myurl', $_POST['replacemytext_myurl']);
            $flag = true;
        }
        if ($flag) {
            echo "更新成功";
        } else {
            echo "更新失败，请检查服务器防火墙!!!";
        }
    }
}
?>
