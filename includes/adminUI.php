<?php 
	// Add the plugin Settings page in the menu
	add_action('admin_menu','create_admin_page');
	// create admin page
	function create_admin_page(){
		add_options_page('redsunset-wp-gitrawcdn设置','redsunset-wp-gitrawcdn','manage_options','redsunset-wp-gitrawcdn','rssgitcdn_options_page');	
	}	
	// Add a new variable and sets the default values in red
	function set_rssgitcdn_options(){		
		add_option('rssgitcdn_cdnurl','raw.sevencdn.com');
	}	
	// delete Ray_color key 
	function unset_rssgitcdn_options(){ 
		delete_option('rssgitcdn_cdnurl');
	}		
	// The plugin Settings page content
	function rssgitcdn_options_page(){ ?>
		<div class="wrap">        	
            <h2>Redsunset Github CDN 设置</h2>
            <?php update_rssgitcdn_options();	// update Ray_color?>
<form method="post">Github RAW CDN: <input class="regular-text code" type="text" name="rssgitcdn_cdnurl" value="<?php echo get_option('rssgitcdn_cdnurl');?>"/>
<input class="button button-primary" type="submit" name="submit" value="保存设置"/>
            </form>
        </div><?php
            $txt_file=file("https://raw.fastgit.org/RSSYLY/redsunset-wp-gitrawcdn/main/cdnresource.txt");
            foreach($txt_file as $value){
                echo $value."<br />";
            }
        ?><?php
	}	
	// update Ray_color option
	function update_rssgitcdn_options(){
		if($_POST['submit']){
			$flag = false;
			if($_POST['rssgitcdn_cdnurl']){
				//echo "die";exit;
				update_option('rssgitcdn_cdnurl',$_POST['rssgitcdn_cdnurl']);
				$flag = true;
			}
			if($flag){
				echo "更新成功";
			}else{
				echo "更新失败，请检查服务器防火墙!!!";	
			}
		}
	}	
?>