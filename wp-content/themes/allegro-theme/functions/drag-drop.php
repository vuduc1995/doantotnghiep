<?php
global $OTfields;
$orangeThemes_general_options= array(



/* ------------------------------------------------------------------------*
 * HOME SETTINGS
 * ------------------------------------------------------------------------*/   

array(
	"type" => "homepage_blocks",
	"title" => "Homepage Blocks:",
	"id" => $OTfields->themeslug."_homepage_blocks",
	"blocks" => array(
		
		array(
			"title" => "Latest News",
			"type" => "homepage_latest_news",
			"options" => array(
				array( "type" => "title", "title" => "Latest News", "home" => "yes" ),
				array( "type" => "input", "id" => $OTfields->themeslug."_homepage_latest_news_title", "title" => "Title:", "home" => "yes" ),
				array( "type" => "scroller", "id" => $OTfields->themeslug."_homepage_latest_news_count", "title" => "Post Count:", "max" => "50", "home" => "yes" ),
				array(
					"type" => "categories",
					"id" => $OTfields->themeslug."_homepage_latest_news_cat",
					"taxonomy" => "category",
					"title" => "Category",
					"home" => "yes"
				),
				array(
					"type" => "select",
					"title" => esc_html__("Show post date in post lists:",'allegro-theme'),
					"id" => $OTfields->themeslug."_homepage_latest_news_date",
					"options"=>array(
						array("slug"=>"on", "name"=>"On"), 
						array("slug"=>"off", "name"=>"Off"), 
					),
					"home" => "yes"
				),

				array(
					"type" => "select",
					"title" => esc_html__("Show post comment count in post lists:",'allegro-theme'),
					"id" => $OTfields->themeslug."_homepage_latest_news_comment",
					"options"=>array(
						array("slug"=>"on", "name"=>"On"), 
						array("slug"=>"off", "name"=>"Off"), 
					),
					"home" => "yes"
				),

			),
		),	

		array(
			"title" => "Latest News Style 2",
			"type" => "homepage_latest_news_2",
			"options" => array(
				array( "type" => "title", "title" => "Latest News", "home" => "yes" ),
				array( "type" => "input", "id" => $OTfields->themeslug."_homepage_latest_news_2_title", "title" => "Title:", "home" => "yes" ),
				array( "type" => "scroller", "id" => $OTfields->themeslug."_homepage_latest_news_2_count", "title" => "Post Count:", "max" => "50", "home" => "yes" ),
				array(
					"type" => "categories",
					"id" => $OTfields->themeslug."_homepage_latest_news_2_cat",
					"taxonomy" => "category",
					"title" => "Category",
					"home" => "yes"
				),
				array(
					"type" => "select",
					"title" => esc_html__("Show post date in post lists:",'allegro-theme'),
					"id" => $OTfields->themeslug."_homepage_latest_news_2_date",
					"options"=>array(
						array("slug"=>"on", "name"=>"On"), 
						array("slug"=>"off", "name"=>"Off"), 
					),
					"home" => "yes"
				),

				array(
					"type" => "select",
					"title" => esc_html__("Show post comment count in post lists:",'allegro-theme'),
					"id" => $OTfields->themeslug."_homepage_latest_news_2_comment",
					"options"=>array(
						array("slug"=>"on", "name"=>"On"), 
						array("slug"=>"off", "name"=>"Off"), 
					),
					"home" => "yes"
				),

			),
		),
		
		array(
			"title" => esc_html__("Latest News With Large Image",'allegro-theme'),
			"type" => "homepage_latest_news_3",
			"options" => array(
				array(
					"type" => "categories",
					"id" => $OTfields->themeslug."_homepage_latest_news_3_cat",
					"taxonomy" => "category",
					"title" => "Category",
					"home" => "yes"
				),
				array(
					"type" => "select",
					"title" => esc_html__("Show post date in post lists:",'allegro-theme'),
					"id" => $OTfields->themeslug."_homepage_latest_news_3_date",
					"options"=>array(
						array("slug"=>"on", "name"=>"On"), 
						array("slug"=>"off", "name"=>"Off"), 
					),
					"home" => "yes"
				),

				array(
					"type" => "select",
					"title" => esc_html__("Show post comment count in post lists:",'allegro-theme'),
					"id" => $OTfields->themeslug."_homepage_latest_news_3_comment",
					"options"=>array(
						array("slug"=>"on", "name"=>"On"), 
						array("slug"=>"off", "name"=>"Off"), 
					),
					"home" => "yes"
				),

			),
		),
		

		array(
			"title" => "HTML Code",
			"type" => "homepage_html",
			"options" => array(
				array( "type" => "input", "id" => $OTfields->themeslug."_homepage_html_title", "title" => "Title:", "home" => "yes" ),
				array( "type" => "textarea", "id" => $OTfields->themeslug."_homepage_html", "title" => "HTML Code:", "home" => "yes" ),
			),
		),

		array(
			"title" => "Banner",
			"type" => "homepage_banner",
			"options" => array(
				array( "type" => "textarea", "id" => $OTfields->themeslug."_homepage_banner", "title" => "HTML Code:","sample" => '<a href="http://www.orange-themes.com" target="_blank"><img src="'.THEME_IMAGE_URL.'no-banner-468x60.jpg" width="468" height="60" alt="" title="" /></a>', "home" => "yes" ),

			),
		),
	)
),


 
 );


$OTfields->add_options($orangeThemes_general_options);
?>