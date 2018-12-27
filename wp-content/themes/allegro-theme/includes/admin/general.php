<?php
global $orange_themes_managment;
$orangeThemes_general_options= array(
 array(
	"type" => "navigation",
	"name" => "General",
	"slug" => "general"
),

array(
	"type" => "tab",
	"slug"=>'general'
),

array(
	"type" => "sub_navigation",
	"subname"=>array(
		array("slug"=>"page", "name"=>"General"), 
		array("slug"=>"blog", "name"=>"Blog"),
		array("slug"=>"gallery", "name"=>"Gallery"),
		array("slug"=>"contact", "name"=>"Contact/Footer"),
		array("slug"=>"banner_settings", "name"=>"Banners")
	)
),

/* ------------------------------------------------------------------------*
 * PAGE SETTINGS
 * ------------------------------------------------------------------------*/

 array(
	"type" => "sub_tab",
	"slug"=>'page'
),

array(
	"type" => "homepage_set_test",
	"title" => "Set up Your Homepage and post page!",
	"desc" => "	<p><b>You have not selected the correct template page for homepage.</b></p>
	<p>Please make sure, you choose template \"Drag & Drop Page Builder\".</p>
	<br/>
	<ul>
		<li>Current front page: <a href='".get_permalink(get_option('page_on_front'))."'>".get_the_title(get_option('page_on_front'))."</a></li>
		<li>Current blog page: <a href'".get_permalink(get_option('page_for_posts'))."'>".get_the_title(get_option('page_for_posts'))."</a></li>
	</ul>",
	"desc_2" => "<p><b>You have NOT enabled homepage.</b></p>
	<p>To use custom homepage, you must first create two <a href='".home_url()."/wp-admin/post-new.php?post_type=page'>new pages</a>, and one of them assign to \"<b>Homepage</b>\" template.Give each page a title, but avoid adding any text.</p>
	<p>Then enable homepage  in <a href='".home_url()."/wp-admin/options-reading.php'>wordpress reading settings</a> (See \"Front page displays\" option). Select your previously created pages from both dropdowns and save changes.</p>"
),
   
array(
	"type" => "row"
),

array(
	"type" => "title",
	"title" => "Add logo image"
),
   
array(
	"type" => "upload",
	"title" => "Add Header Logo Image",
	"info" => "Suggested image size is 208x49px",
	"id" => $orange_themes_managment->themeslug."_logo"
),      
    
array(
	"type" => "upload",
	"title" => "Add Footer Logo Image",
	"info" => "Suggested image size is 145x26px",
	"id" => $orange_themes_managment->themeslug."_logo_footer"
),      
 
array(
	"type" => "close"
),
array(
	"type" => "row"
),

array(
	"type" => "title",
	"title" => "Favicon"
),
   
array(
	"type" => "upload",
	"title" => "Favicon",
	"info" => "Favicons are the small 16 pixel by 16 pixel pictures you see beside some URLs in your browser's address bar.",
	"id" => $orange_themes_managment->themeslug."_favicon"
),   

array(
	"type" => "close"
),

array(
	"type" => "row"
),
array(
	"type" => "title",
	"title" => "Header Text"
),

array(
	"type" => "textarea",
	"title" => "Text/HTML",
	"id" => $orange_themes_managment->themeslug."_header_text"
),

array(
	"type" => "close"
),

array(
	"type" => "row"
),
array(
	"type" => "title",
	"title" => esc_html__("Header Search",'allegro-theme'),
),

array(
	"type" => "checkbox",
	"title" => "Show:",
	"id"=>$orange_themes_managment->themeslug."_search"
),

array(
	"type" => "close"
),

array(
	"type" => "row"
),

array(
	"type" => "title",
	"title" => "Weather Forecast"
),

array(
	"type" => "checkbox",
	"title" => "Show Weather Forecast:",
	"id"=>$orange_themes_managment->themeslug."_weather"
),

array(
	"type" => "radio",
	"id" => $orange_themes_managment->themeslug."_temperature",
	"radio" => array(
		array("title" => "Show Temperature In C:", "value" => "C"),
		array("title" => "Show Temperature In F:", "value" => "F")
	),
	"std" => "C",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_weather", "value" => "on")
	)
),
array(
	"type" => "title",
	"title" => "API type",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_weather", "value" => "on")
	)
),

array(
	"type" => "radio",
	"id" => $orange_themes_managment->themeslug."_weather_api_key_type",
	"radio" => array(
		array("title" => "Free API Key:", "value" => "free"),
		array("title" => "Premium API Key:", "value" => "premium")
	),
	"std" => "free",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_weather", "value" => "on")
	)
),
array(
	"type" => "title",
	"title" => "Location",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_weather", "value" => "on")
	)
),

array(
	"type" => "radio",
	"id" => $orange_themes_managment->themeslug."_weather_location_type",
	"radio" => array(
		array("title" => "Search For Customer Location:", "value" => "customer"),
		array("title" => "Set Your Own Custom Location:", "value" => "custom")
	),
	"std" => "customer",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_weather", "value" => "on")
	)
),
array(
	"type" => "input",
	"title" => "City Name, Country",
	"info" => "Example - London,United Kingdom",
	"id" => $orange_themes_managment->themeslug."_weather_city",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_weather_location_type", "value" => "custom")
	)
),

array(
	"type" => "input",
	"title" => "API Key",
	"info" => "The API Key You Can Get Here: <a href='https://developer.worldweatheronline.com/auth/register' style='color:#fff' target='_blank'>Register API Key</a>",
	"id" => $orange_themes_managment->themeslug."_weather_api_2",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_weather", "value" => "on")
	)
),
array(
	"type" => "close"
),

array(
	"type" => "save",
	"title" => "Save Changes"
),
   
array(
	"type" => "closesubtab"
),

/* ------------------------------------------------------------------------*
 * BLOG SETTINGS
 * ------------------------------------------------------------------------*/   
  
array(
	"type" => "sub_tab",
	"slug"=>'blog'
),

array(
	"type" => "row"
),

array(
	"type" => "title",
	"title" => "Unit Settings"
),

array(
	"type" => "checkbox",
	"title" => "Show thumbnails in blog post list:",
	"id"=>$orange_themes_managment->themeslug."_show_first_thumb"
),

array(
	"type" => "checkbox",
	"title" => "Show thumbnail in open post/page:",
	"id"=>$orange_themes_managment->themeslug."_show_single_thumb"
),

array(
	"type" => "checkbox",
	"title" => "Show \"no image\" thumbnail, when no thumbnail is available:",
	"id"=>$orange_themes_managment->themeslug."_show_no_image_thumb"
),
array(
	"type" => "close"
),

array(
	"type" => "row"
),

array(
	"type" => "title",
	"title" =>	esc_html__("Post Settings",'allegro-theme')
),

array(
	"type" => "checkbox",
	"title" => esc_html__("Show \"Updated\" tag in bog page and homepage:",'allegro-theme'),
	"id"=>$orange_themes_managment->themeslug."_updated_tag"
),

array(
	"type" => "input",
	"title" => esc_html__("Updated Tag Display Time In Days",'allegro-theme'),
	"id" => $orange_themes_managment->themeslug."_updated_tag_time",
	"number" => "yes",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_updated_tag", "value" => "on")
	)
),

array(
	"type" => "checkbox",
	"title" => esc_html__("Show post date in post lists:",'allegro-theme'),
	"id"=>$orange_themes_managment->themeslug."_post_date"
),

array(
	"type" => "checkbox",
	"title" => esc_html__("Show post comment count in post lists:",'allegro-theme'),
	"id"=>$orange_themes_managment->themeslug."_post_comment"
),
array(
	"type" => "checkbox",
	"title" => esc_html__("Show post author in blog page:",'allegro-theme'),
	"id"=>$orange_themes_managment->themeslug."_post_author"
),

array(
	"type" => "close"
),

array(
	"type" => "row"
),
array(
	"type" => "title",
	"title" => "Show Social Share Buttons"
),

array(
	"type" => "radio",
	"id" => $orange_themes_managment->themeslug."_share_all",
	"radio" => array(
		array("title" => "On:", "value" => "show"),
		array("title" => "Off:", "value" => "hide"),
		array("title" => "Custom For Each Post/Page:", "value" => "custom")
	),
	"std" => "custom"
),

array(
	"type" => "close"
),

array(
	"type" => "row"
),

array(
	"type" => "title",
	"title" => "Show \"Similar News\" In Single Post"
),

array(
	"type" => "radio",
	"id" => $orange_themes_managment->themeslug."_similar_posts",
	"radio" => array(
		array("title" => "Show:", "value" => "show"),
		array("title" => "Hide:", "value" => "hide"),
		array("title" => "Custom For Each Post:", "value" => "custom")
	),
	"std" => "on"
),

array(
	"type" => "close"
),
array(
	"type" => "save",
	"title" => "Save Changes"
),

array(
	"type" => "closesubtab"
),


/* ------------------------------------------------------------------------*
 * CONTACT SETTINGS
 * ------------------------------------------------------------------------*/   

array(
	"type" => "sub_tab",
	"slug"=>'contact'
),
array(
	"type" => "row"
),
array(
	"type" => "title",
	"title" => "Contact Information"
),

array(
	"type" => "input",
	"title" => "Twitter Account Name:",
	"id" => $orange_themes_managment->themeslug."_twitter_name"
),

array(
	"type" => "close"
),

array(
	"type" => "row"
),

array(
	"type" => "title",
	"title" => "Footer CopyRight"
),

array(
	"type" => "textarea",
	"title" => "Text:",
	"id" => $orange_themes_managment->themeslug."_copyright"
),

array(
	"type" => "close"
),


array(
	"type" => "save",
	"title" => "Save Changes"
),

array(
	"type" => "closesubtab"
),


/* ------------------------------------------------------------------------*
 * GALLERY SETTINGS
 * ------------------------------------------------------------------------*/   
array(
	"type" => "sub_tab",
	"slug"=>'gallery'
),

array(
	"type" => "row"
),

array(
	"type" => "title",
	"title"=>'Gallery Settings'
),

array(
	"type" => "input",
	"title" => "Items per gallery page:",
	"id" => $orange_themes_managment->themeslug."_gallery_items",
	"number" => "yes",
	"std" => "10"
),

array(
	"type" => "close"
),

array(
	"type" => "row"
),

array(
	"type" => "title",
	"title" => "Show \"Similar Posts\" In Single Galley"
),

array(
	"type" => "radio",
	"id" => $orange_themes_managment->themeslug."_similar_posts_gallery",
	"radio" => array(
		array("title" => "Show:", "value" => "show"),
		array("title" => "Hide:", "value" => "hide"),
		array("title" => "Custom For Each Gallery Page:", "value" => "custom")
	),
	"std" => "on"
),

array(
	"type" => "close"
),


array(
	"type" => "save",
	"title" => "Save Changes"
),

array(
	"type" => "closesubtab"
),


/* ------------------------------------------------------------------------*
 * BANNER SETTINGS
 * ------------------------------------------------------------------------*/   

array(
	"type" => "sub_tab",
	"slug"=>'banner_settings'
),


array(
	"type" => "row"
),
array(
	"type" => "title",
	"title" => esc_html__('Banner Settings','allegro-theme')
),
array(
	"type" => "checkbox",
	"title" => esc_html__('Show "Advertisement" at each banner','allegro-theme'),
	"id" => $orange_themes_managment->themeslug."_banner_adv",

),


array(
	"type" => "title",
	"title" => "Top Banner"
),

array(
	"type" => "checkbox",
	"title" => "Enable Banner",
	"id" => $orange_themes_managment->themeslug."_top_banner",
	"std" => "off"
),

array(
	"type" => "textarea",
	"title" => "Banner HTML Code",
	"sample" => '<a href="http://www.orange-themes.com" target="_blank"><img src="'.THEME_IMAGE_URL.'no-banner-728x90.jpg" alt="" title="" /></a>',
	"id" => $orange_themes_managment->themeslug."_top_banner_code",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_top_banner", "value" => "on")
	)
),

array(
	"type" => "close"
),


array(
	"type" => "row"
),

array(
	"type" => "title",
	"title" => "Select Pop Up Banner Type"
),

array(
	"type" => "radio",
	"id" => $orange_themes_managment->themeslug."_banner_type",
	"radio" => array(
		array("title" => "Off", "value" => "off"),
		array("title" => "Banner With Image", "value" => "image"),
		array("title" => "Banner With Text Or HTML Code", "value" => "text"),
		array("title" => "Banner With Image &amp; Text", "value" => "text_image")
	),
	"std" => "off"
),

array(
	"type" => "upload",
	"title" => "Add Banner Image",
	"id" => $orange_themes_managment->themeslug."_banner_image",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_banner_type", "value" => "image")
	)
),

array(
	"type" => "textarea",
	"title" => "Banner content",
	"info" => "You can copy also some HTML code here.",
	"id" => $orange_themes_managment->themeslug."_banner_text",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_banner_type", "value" => "text")
	)
),

array(
	"type" => "upload",
	"title" => "Add Banner Image",
	"id" => $orange_themes_managment->themeslug."_banner_text_image_img",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_banner_type", "value" => "text_image")
	)
),

array(
	"type" => "textarea",
	"title" => "Banner text",
	"info" => "You add only text.",
	"id" => $orange_themes_managment->themeslug."_banner_text_image_txt",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_banner_type", "value" => "text_image")
	)
),

array(
	"type" => "close"
),

array(
	"type" => "row"
),

array(
	"type" => "title",
	"title" => "Banner Settings",
),

array(
	"type" => "select",
	"title" => "Start Time",
	"id" => $orange_themes_managment->themeslug."_banner_start",
	"options"=>array(
		array("slug"=>"0", "name"=>"0 Secconds"), 
		array("slug"=>"5", "name"=>"5 Secconds"),
		array("slug"=>"10", "name"=>"10 Secconds"),
		array("slug"=>"15", "name"=>"15 Secconds"),
		array("slug"=>"20", "name"=>"20 Secconds"),
		array("slug"=>"25", "name"=>"25 Secconds"),
		array("slug"=>"30", "name"=>"30 Secconds"),
		array("slug"=>"60", "name"=>"1 Minute"),
		array("slug"=>"120", "name"=>"2 Minute"),
		array("slug"=>"180", "name"=>"3 Minute"),

		),
	"std" => "off"
),

array(
	"type" => "select",
	"title" => "Close Time",
	"id" => $orange_themes_managment->themeslug."_banner_close",
	"options"=>array(
		array("slug"=>"0", "name"=>"Off"), 
		array("slug"=>"5", "name"=>"5 Secconds"),
		array("slug"=>"10", "name"=>"10 Secconds"),
		array("slug"=>"15", "name"=>"15 Secconds"),
		array("slug"=>"20", "name"=>"20 Secconds"),
		array("slug"=>"25", "name"=>"25 Secconds"),
		array("slug"=>"30", "name"=>"30 Secconds"),
		array("slug"=>"60", "name"=>"1 Minute"),
		array("slug"=>"120", "name"=>"2 Minute"),
		array("slug"=>"180", "name"=>"3 Minute"),

		),
	"std" => "off"
),

array(
	"type" => "select",
	"title" => "Fly In From",
	"id" => $orange_themes_managment->themeslug."_banner_fly_in",
	"options"=>array(
		array("slug"=>"off", "name"=>"Off"), 
		array("slug"=>"top", "name"=>"Top"),
		array("slug"=>"top-left", "name"=>"Top Left"),
		array("slug"=>"top-right", "name"=>"Top Right"),
		array("slug"=>"left", "name"=>"Left"),
		array("slug"=>"bottom", "name"=>"Bottom"),
		array("slug"=>"bottom-left", "name"=>"Bottom Left"),
		array("slug"=>"bottom-right", "name"=>"Bottom Right"),
		),
	"std" => "off"
),

array(
	"type" => "select",
	"title" => "Fly Out To",
	"id" => $orange_themes_managment->themeslug."_banner_fly_out",
	"options"=>array(
		array("slug"=>"off", "name"=>"Off"), 
		array("slug"=>"top", "name"=>"Top"),
		array("slug"=>"top-left", "name"=>"Top Left"),
		array("slug"=>"top-right", "name"=>"Top Right"),
		array("slug"=>"left", "name"=>"Left"),
		array("slug"=>"bottom", "name"=>"Bottom"),
		array("slug"=>"bottom-left", "name"=>"Bottom Left"),
		array("slug"=>"bottom-right", "name"=>"Bottom Right"),
		),
	"std" => "off"
),

array(
	"type" => "select",
	"title" => "Show Banner after",
	"info" => "How many times site may be viewed until the popup will be shown again",
	"id" => $orange_themes_managment->themeslug."_banner_views",
	"options"=>array(
		array("slug"=>"0", "name"=>"0 Click"), 
		array("slug"=>"1", "name"=>"1 Click"),
		array("slug"=>"2", "name"=>"2 Clicks"),
		array("slug"=>"2", "name"=>"3 Clicks"),
		array("slug"=>"4", "name"=>"4 Clicks"),
		array("slug"=>"5", "name"=>"5 Clicks"),
		array("slug"=>"10", "name"=>"10 Clicks"),
		array("slug"=>"20", "name"=>"20 Clicks"),
		),
	"std" => "off"
),

array(
	"type" => "select",
	"title" => "How offen show the banner",
	"id" => $orange_themes_managment->themeslug."_banner_timeout",
	"options"=>array(
		array("slug"=>"0", "name"=>"One time per visit"), 
		array("slug"=>"1", "name"=>"Once a day"), 
		array("slug"=>"2", "name"=>"Once in 2 days"),
		array("slug"=>"3", "name"=>"Once in 3 days"),
		),
	"std" => "off"
),

array(
	"type" => "checkbox",
	"title" => "Enable Background Overlay:",
	"id" => $orange_themes_managment->themeslug."_banner_overlay",
	"std" => "off"
),

array(
	"type" => "close"
),

array(
	"type" => "save",
	"title" => "Save Changes"
),

array(
	"type" => "closesubtab"
),

array(
	"type" => "closetab"
)
 
 );


$orange_themes_managment->add_options($orangeThemes_general_options);
?>