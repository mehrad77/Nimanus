<?php

function theme_settings_init(){
register_setting( 'theme_settings', 'theme_settings' );
}
 
function add_settings() {
    add_theme_page("تنظیمات چیستا", "تنظیمات قالب چیستا", 'manage_options', 'theme-panel', 'theme_settings_page');
}
 
add_action( 'admin_init', 'theme_settings_init' );
add_action( 'admin_menu', 'add_settings' );



function theme_settings_page() { ?>
    <div class="wrap">
        <h1>Theme Panel</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields("section");
            do_settings_sections("theme-options");
            submit_button();
            ?>
        </form>
    </div>
<?php }




/******************************3*/

function display_telegram_element()
{
	?>
    	<input type="text" name="telegram_url" id="telegram_url" value="<?php echo get_option('telegram_url'); ?>" />
    <?php
}

add_action("admin_init", "display_theme_panel_fields");

function display_twitter_element()
{
	?>
    	<input type="text" name="twitter_url" id="twitter_url" value="<?php echo get_option('twitter_url'); ?>" />
    <?php
}

function display_instagram_element()
{
	?>
    	<input type="text" name="instagram_url" id="instagram_url" value="<?php echo get_option('instagram_url'); ?>" />
    <?php
}

function display_linkedin_element()
{
	?>
    	<input type="text" name="linkedin_url" id="linkedin_url" value="<?php echo get_option('linkedin_url'); ?>" />
    <?php
}

function display_slideshare_element()
{
	?>
    	<input type="text" name="slideshare_url" id="slideshare_url" value="<?php echo get_option('slideshare_url'); ?>" />
    <?php
}
/****************************************4*/

function display_layout_element()
{
	?>
		<input type="checkbox" name="theme_layout" value="1" <?php checked(1, get_option('theme_layout'), true); ?> /> 
	<?php
}

function display_copyright_element()
{
	?>
    	<input type="text" name="copyright" id="copyright" value="<?php echo get_option('copyright'); ?>" />
    <?php
}

function display_copyright_theme_element()
{
	?>
    	<input type="text" name="copyright_theme" id="copyright_theme" value="<?php echo get_option('copyright_theme'); ?>" />
    <?php
}
/****************************************5*/

function display_theme_panel_fields()
{
	add_settings_section("section", "تنظیمات عمومی", null, "theme-options");
	
	add_settings_field("twitter_url", "پیوند توییتر", "display_twitter_element", "theme-options", "section");
    add_settings_field("instagram_url", "پیوند اینستاگرام", "display_instagram_element", "theme-options", "section");
    add_settings_field("telegram_url", "پیوند تلگرام", "display_telegram_element", "theme-options", "section");
    add_settings_field("linkedin_url", "پیوند لینکدین", "display_linkedin_element", "theme-options", "section");
    add_settings_field("slideshare_url", "پیوند اسلایدشِیر", "display_slideshare_element", "theme-options", "section");
    add_settings_field("copyright", "متن کپی‌رایت", "display_copyright_element", "theme-options", "section");
    add_settings_field("copyright_theme", "متن کپی‌رایت طراح وب‌سایت", "display_copyright_theme_element", "theme-options", "section");
    add_settings_field("theme_layout", "Do you want the layout to be responsive?", "display_layout_element", "theme-options", "section");

    register_setting("section", "twitter_url");
    register_setting("section", "instagram_url");
    register_setting("section", "telegram_url");
    register_setting("section", "linkedin_url");
    register_setting("section", "slideshare_url");
    register_setting("section", "copyright");
    register_setting("section", "copyright_theme");
    register_setting("section", "theme_layout");

	add_settings_section("section", "All Settings", null, "theme-options");
}

add_action("admin_init", "display_theme_panel_fields");

/************************************5*/
function logo_display()
{
	?>
        <input type="file" name="logo" /> 
        <?php echo get_option('logo'); ?>
   <?php
}

function handle_logo_upload()
{
	if(!empty($_FILES["demo-file"]["tmp_name"]))
	{
		$urls = wp_handle_upload($_FILES["logo"], array('test_form' => FALSE));
	    $temp = $urls["url"];
	    return $temp;   
	}
	  
	return $option;
}

add_action("admin_init", "display_theme_panel_fields");


/************************************6*/
$layout = get_option('theme_layout');
$twitter_url = get_option('twitter_url');