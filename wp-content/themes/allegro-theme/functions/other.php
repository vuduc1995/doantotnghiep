<?php

/* -------------------------------------------------------------------------*
 * 								CONTENT WIDTH								*
 * -------------------------------------------------------------------------*/
 
 if ( ! isset( $content_width ) ) 
    $content_width = 900;


/* -------------------------------------------------------------------------*
 * 							CATEGORIE CUSTOM COLOR							*
 * -------------------------------------------------------------------------*/	


	$config = array(
	   'pages' => array('category'),                    // taxonomy name, accept categories, post_tag and custom taxonomies
	   'context' => 'normal',                           // where the meta box appear: normal (default), advanced, side; optional
	   'fields' => array(),                             // list of meta fields (can be added by field arrays)
	   'local_images' => false,                         // Use local or hosted images (meta box images for add/remove)
	   'use_with_theme' => true                        	//change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
	);




	$sidebar_names = get_option( THEME_NAME."_sidebar_names" );
	$sidebar_names = explode( "|*|", $sidebar_names );
	$sidebars = array();
	$sidebars['default'] = 'Default';

	if(!empty($sidebar_names)) {
		foreach ($sidebar_names as $sidebar) {
			if($sidebar!="") {
				$sidebars[strtolower($sidebar)] = $sidebar;
			}
		}
	}	

	$sidebarSmall = array();
	$sidebarSmall['off'] = 'Disabled';
	$sidebarSmall['default'] = 'Default';

	if(!empty($sidebar_names)) {
		foreach ($sidebar_names as $sidebar) {
			if($sidebar!="") {
				$sidebarSmall[strtolower($sidebar)] = $sidebar;
			}
		}
	}



	$my_meta = new Tax_Meta_Class($config);
	$my_meta->addColor(THEME_NAME.'_title_color',array('name'=> 'Category Color'));
	$my_meta->addSelect(THEME_NAME.'_breaking_slider',array('off'=>'Off','on'=>'On'),array('name'=> __('Category Breaking News Slider ','allegro-theme'), 'std'=> array('off')));
	$my_meta->addSelect(THEME_NAME.'_sidebar_position',array('right'=>'Right','left'=>'Left'),array('name'=> __('Main Sidebar Position ','allegro-theme'), 'std'=> array('right')));
	$my_meta->addSelect(THEME_NAME.'_sidebar_select', $sidebars ,array('name'=> __('Main Sidebar','allegro-theme'), 'std'=> array('default')));
	$my_meta->addSelect(THEME_NAME.'_sidebar_position_small',array('right'=>'Right','left'=>'Left'),array('name'=> __('Small Position ','allegro-theme'), 'std'=> array('right')));
	$my_meta->addSelect(THEME_NAME.'_sidebar_select_small', $sidebarSmall ,array('name'=> __('Small Sidebar','allegro-theme'), 'std'=> array('off')));
	$my_meta->Finish();


	


/* -------------------------------------------------------------------------*
 * 					GET META VALUE OUTSIDE THE LOOP							*
 * -------------------------------------------------------------------------*/
 
 function ot_meta($value, $id) {
	$meta = get_post_meta($value, $id, true);
	return $meta;
}


/* -------------------------------------------------------------------------*
 * 								GET IMAGE HTML								*
 * -------------------------------------------------------------------------*/
 
 function ot_image_html($id, $width=0, $height=0) {
 	$image = get_post_thumb($id,$width,$height);
	$return = '<img class="image-border" src="'.$image["src"].'" alt="'.get_the_title($id).'" />';
	return $return;
}

/* -------------------------------------------------------------------------*
 * 								GET IMAGE HTML								*
 * -------------------------------------------------------------------------*/
 
 function ot_updated_tag_html() {
 	global $post;
 	if (get_the_modified_time() != get_the_time() && (get_the_modified_time('U')-get_the_time('U'))<=(get_option(THEME_NAME."_updated_tag_time")*60*60*60) && get_option(THEME_NAME."_updated_tag")=="on" && get_post_meta ( $post->ID, THEME_NAME."_updated_tag", true )!="no") {
 		echo '<span class="tag" title="'.esc_html__("Last Update: ",'allegro-theme').get_the_modified_time("H:i, j.M Y").'">'.esc_html__("Updated",'allegro-theme').'</span>';	

 	}
}


/* -------------------------------------------------------------------------*
 * 							OT GET SIDEBAR SIDE								*
 * -------------------------------------------------------------------------*/
 
function ot_get_sidebar($id, $side="right") {
	//sidebars defauult option
	$sidebarPosition = get_option ( THEME_NAME."_sidebar_position" ); 
	//sidebars singlepost/page option
	$sidebarPositionCustom = get_post_meta ( $id, THEME_NAME."_sidebar_position", true ); 

	//left side sidebar
	if( ($sidebarPosition == "left" || ( $sidebarPosition == "custom" &&  $sidebarPositionCustom == "left")) && $side == 'left' ) { 
		get_template_part(THEME_INCLUDES."sidebar");
	}

	//right side sidebar
	if( ($sidebarPosition == "right" || ( $sidebarPosition == "custom" &&  $sidebarPositionCustom == "right") || ( $sidebarPosition == "custom" && !$sidebarPositionCustom )) && $side == 'right') { 
		get_template_part(THEME_INCLUDES."sidebar");
	}

}


/* -------------------------------------------------------------------------*
 * 							AVARAGE POST RATING							*
 * -------------------------------------------------------------------------*/
 
function ot_avarage_rating($id) {
 	$ratings = get_post_meta( $id, THEME_NAME."_ratings", true );
	$totalRate = array();
	$rating = explode(";", $ratings);

	foreach($rating as $rate) { 
		$ratingValues = explode(":", $rate);
		if(isset($ratingValues[1])){
			$ratingPrecentage = (str_replace(",",".",$ratingValues[1]))*20;
		}
		$totalRate[] = $ratingPrecentage;
	} 

	if(!empty($totalRate)) { 
		$rateCount = count($totalRate);	
		$total = 0;
		foreach ($totalRate as $val) {
			$total = $total + $val;
		}

		$avaragePrecentage = round($total/$rateCount,2);
		$avarageRate = round((($total/$rateCount)/20),2);

	}

	echo $avaragePrecentage;

}

/* -------------------------------------------------------------------------*
 * 								GET TITLE COLOR								*
 * -------------------------------------------------------------------------*/
 
function ot_title_color($id, $type="category", $echo=true) {
 	if($type == "category" && $id!="popular" && $id!="latest") {
		$my_meta = new Tax_Meta_Class('');
		$titleColor = $my_meta->get_tax_meta($id, THEME_NAME.'_title_color');
		$my_meta->Finish();
	} else if ($type=="page") {
		$titleColor = "#".ot_meta($id, THEME_NAME."_title_color"); 
	} else if ($id=="popular") {
		$titleColor = "#".get_option(THEME_NAME."_popular_post_color");
	} else if ($id=="latest") {
		$titleColor = "#".get_option(THEME_NAME."_latest_post_color");
	}

	
	if(!isset($titleColor) || $titleColor=="" || $titleColor=="#") $titleColor = "#".get_option(THEME_NAME."_default_cat_color");
	
	if($echo!=false) {
		echo $titleColor;
	} else {
		return $titleColor;
	}
}

/* -------------------------------------------------------------------------*
 * 								GET OPTION									*
 * -------------------------------------------------------------------------*/
 
function ot_get_option($id, $type, $echo=false) {
	$my_meta = new Tax_Meta_Class('');
	$value = $my_meta->get_tax_meta($id, THEME_NAME.'_'.$type);
	$my_meta->Finish();

	if($echo!=false) {
		echo $value;
	} else {
		return $value;
	}
}

/* -------------------------------------------------------------------------*
 * 							CHECK WOOCOMMERCE								*
 * -------------------------------------------------------------------------*/
 
function ot_is_woocommerce_activated() {
	if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
}

/* -------------------------------------------------------------------------*
 * 							MAIN NAV MENU WALKER							*
 * -------------------------------------------------------------------------*/

class OT_Walker extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = array(), $current_object_id = 0) {
        global $wp_query;
		$my_meta = new Tax_Meta_Class('');
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        


        $class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
        $class_names = ' class="' . esc_attr( $class_names ).'"';

		
        $output .= $indent . '<li id="menu-item-'. $item->ID . '"'.$value . $class_names .'>';

        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

        //$attributes .= ' data-id="'. esc_attr( $item->object_id        ) .'"';
        //$attributes .= ' data-slug="'. esc_attr(  basename(get_permalink($item->object_id )) ) .'"';

        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        if($depth==0) {
		    if(isset($item->classes[4]) && in_array("ot-dropdown", $item->classes)) {
		      $item_output .= '<span>';
		    } 	
        }
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;


        if($depth==0) {
		   if(isset($item->classes[4]) && in_array("ot-dropdown", $item->classes)) {
		      $item_output .= '</span>';
		    } 	
        }
        $item_output .= '</a>';

        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		$my_meta->Finish();

    }
}

/* -------------------------------------------------------------------------*
 * 								TOP NAV MENU WALKER							*
 * -------------------------------------------------------------------------*/

class OT_Walker_Top extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = array(), $current_object_id = 0) {
        global $wp_query;
		$my_meta = new Tax_Meta_Class('');
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        
        if($depth==0) {
		    if(empty($item->description)) {
		      	$class = ' single';
		    } else {
		    	$class = false;
		    }	
        } else {
        	$class = false;
        }

        $class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
        $class_names = ' class="' . esc_attr( $class_names.$class ).'"';

		
        $output .= $indent . '<li id="menu-item-'. $item->ID . '"'. $value . $class_names .'>';

        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
        //$attributes .= ' data-id="'. esc_attr( $item->object_id        ) .'"';
        //$attributes .= ' data-slug="'. esc_attr(  basename(get_permalink($item->object_id )) ) .'"';

        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        if($depth==0) {
		    if(isset($item->classes[4]) && in_array("ot-dropdown", $item->classes)) {
		      $item_output .= '<span>';
		    } 	
        }
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;

        if($depth==0 && $item->description ) {
       		$item_output .= '<i>'.$item->description.'</i>';
       	}
        if($depth==0) {
		   if(isset($item->classes[4]) && in_array("ot-dropdown", $item->classes)) {
		      $item_output .= '</span>';
		    } 	
        }
        $item_output .= '</a>';

        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		$my_meta->Finish();



    }
}
add_filter( 'wp_nav_menu_objects', 'add_menu_parent_class' );
function add_menu_parent_class( $items ) {
	
	$parents = array();
	foreach ( $items as $item ) {
		if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
			$parents[] = $item->menu_item_parent;
		}
	}
	
	foreach ( $items as $item ) {
		if ( in_array( $item->ID, $parents ) ) {
			$item->classes[] = 'ot-dropdown'; 
		}
	}
	
	return $items;    
}


function remove_br($subject) {
	$subject = str_replace("<br/>", " ", $subject );
	$subject = str_replace("<br>", " ", $subject );
	$subject = str_replace("<br />", " ", $subject );
	return $subject;
}

function get_query_string_paged() {
	global $query_string;
	$pos = strpos($query_string,"paged=");
	if($pos !== false ) {
		$sub = substr($query_string,$pos);
		$posand = strpos($sub,"&");
		if ($posand == 0) {$paged = substr($sub,6);}
		else { $paged = substr($sub,6,$posand-6);}
		return $paged;
	}
	return 0;
}

function ot_get_page_array($array) {
	$args =  array(
			'post_type' => 'page',
			'fields' => 'ids' ,
			'posts_per_page' => '-1' );

	if(is_array($array)) {
		$args['meta_query'] = array();
		$args['meta_query']['relation'] = 'OR';
		foreach($array as $n) {
			$args['meta_query'][] = array(
				'key' => '_wp_page_template',
				'value' => 'template-'.$n.'.php'
			);
		}
	} else {
		$args['meta_key'] = '_wp_page_template';
		$args['meta_value'] = 'template-'.$array.'.php';
	}

	$query = new WP_Query($args);

	if(isset($query->posts) && is_array($query->posts)) return ($query->posts);
	return false;
}


function get_gallery_page() {
	return ot_get_page(array('gallery'));
}

function get_shop_page() {
	return ot_get_page(array('shop'));
}

function get_home_page() {
	return ot_get_page(array('homepage'));
}
function get_menu_page() {
	return ot_get_page(array('menucard'));
}
function get_events_page() {
	return ot_get_page(array('events'));
}

function get_archive_page() {
	return ot_get_page(array('archive'));
}

function get_fullwidth_page() {
	return ot_get_page(array('full-width'));
}
function get_map_page() {
	return ot_get_page(array('gallery'));
}

function ot_get_page($name, $type="array") {
	
	$args =  array( 
			'post_type' => 'page',
			'fields' => 'ids',
			'posts_per_page' => '-1' );

	if(is_array($name)) {
		$args['meta_query'] = array();
		$args['meta_query']['relation'] = 'OR';
		foreach($name as $n) {
			$args['meta_query'][] = array(
				'key' => '_wp_page_template',
				'value' => 'template-'.$n.'.php'
			);
		}
	} else {
		$args['meta_key'] = '_wp_page_template';
		$args['meta_value'] = 'template-'.$name.'.php';
	}

	$query = new WP_Query($args);
	$pageID = $query->posts;

	if($type=="array") {
		return $pageID;
	} else {
		if(isset($pageID[0])) {
			return $pageID[0];
		} else {
			return false;
		}

	}
}


/* -------------------------------------------------------------------------*
 * 								Entypo Icons								*
 * -------------------------------------------------------------------------*/

function ot_entypo_icons(){
	$glyphTable = array(
              'phone' => '&#128222;',
             'mobile' => '&#128241;',
              'mouse' => '&#59273;',
            'address' => '&#59171;',
               'mail' => '&#9993;',
        'paper-plane' => '&#128319;',
             'pencil' => '&#9998;',
            'feather' => '&#10002;',
             'attach' => '&#128206;',
              'inbox' => '&#59255;',
              'reply' => '&#59154;',
          'reply-all' => '&#59155;',
            'forward' => '&#10150;',
               'user' => '&#128100;',
              'users' => '&#128101;',
           'add-user' => '&#59136;',
              'vcard' => '&#59170;',
             'export' => '&#59157;',
           'location' => '&#59172;',
                'map' => '&#59175;',
            'compass' => '&#59176;',
          'direction' => '&#10146;',
         'hair-cross' => '&#127919;',
              'share' => '&#59196;',
          'shareable' => '&#59198;',
              'heart' => '&hearts;',
        'heart-empty' => '&#9825;',
               'star' => '&#9733;',
         'star-empty' => '&#9734;',
          'thumbs-up' => '&#128077;',
        'thumbs-down' => '&#128078;',
               'chat' => '&#59168;',
            'comment' => '&#59160;',
              'quote' => '&#10078;',
               'home' => '&#8962;',
              'popup' => '&#59212;',
             'search' => '&#128269;',
         'flashlight' => '&#128294;',
              'print' => '&#59158;',
               'bell' => '&#128276;',
               'link' => '&#128279;',
               'flag' => '&#9873;',
                'cog' => '&#9881;',
              'tools' => '&#9874;',
             'trophy' => '&#127942;',
                'tag' => '&#59148;',
             'camera' => '&#128247;',
          'megaphone' => '&#128227;',
               'moon' => '&#9789;',
            'palette' => '&#127912;',
               'leaf' => '&#127810;',
               'note' => '&#9834;',
        'beamed-note' => '&#9835;',
                'new' => '&#128165;',
     'graduation-cap' => '&#127891;',
               'book' => '&#128213;',
          'newspaper' => '&#128240;',
                'bag' => '&#128092;',
           'airplane' => '&#9992;',
           'lifebuoy' => '&#59272;',
                'eye' => '&#59146;',
              'clock' => '&#128340;',
                'mic' => '&#127908;',
           'calendar' => '&#128197;',
              'flash' => '&#9889;',
      'thunder-cloud' => '&#9928;',
            'droplet' => '&#128167;',
                 'cd' => '&#128191;',
          'briefcase' => '&#128188;',
                'air' => '&#128168;',
          'hourglass' => '&#9203;',
              'gauge' => '&#128711;',
           'language' => '&#127892;',
            'network' => '&#59254;',
                'key' => '&#128273;',
            'battery' => '&#128267;',
             'bucket' => '&#128254;',
             'magnet' => '&#59297;',
              'drive' => '&#128253;',
                'cup' => '&#9749;',
             'rocket' => '&#128640;',
              'brush' => '&#59290;',
           'suitcase' => '&#128710;',
       'traffic-cone' => '&#128712;',
              'globe' => '&#127758;',
           'keyboard' => '&#9000;',
            'browser' => '&#59214;',
            'publish' => '&#59213;',
         'progress-3' => '&#59243;',
         'progress-2' => '&#59242;',
         'progress-1' => '&#59241;',
         'progress-0' => '&#59240;',
         'light-down' => '&#128261;',
           'light-up' => '&#128262;',
             'adjust' => '&#9681;',
               'code' => '&#59156;',
            'monitor' => '&#128187;',
           'infinity' => '&infin;',
         'light-bulb' => '&#128161;',
        'credit-card' => '&#128179;',
           'database' => '&#128248;',
          'voicemail' => '&#9991;',
          'clipboard' => '&#128203;',
               'cart' => '&#59197;',
                'box' => '&#128230;',
             'ticket' => '&#127915;',
                'rss' => '&#59194;',
             'signal' => '&#128246;',
        'thermometer' => '&#128255;',
              'water' => '&#128166;',
             'sweden' => '&#62977;',
         'line-graph' => '&#128200;',
          'pie-chart' => '&#9716;',
          'bar-graph' => '&#128202;',
         'area-graph' => '&#128318;',
               'lock' => '&#128274;',
          'lock-open' => '&#128275;',
             'logout' => '&#59201;',
              'login' => '&#59200;',
              'check' => '&#10003;',
              'cross' => '&#10060;',
      'squared-minus' => '&#8863;',
       'squared-plus' => '&#8862;',
      'squared-cross' => '&#10062;',
      'circled-minus' => '&#8854;',
       'circled-plus' => '&oplus;',
      'circled-cross' => '&#10006;',
              'minus' => '&#10134;',
               'plus' => '&#10133;',
              'erase' => '&#9003;',
              'block' => '&#128683;',
               'info' => '&#8505;',
       'circled-info' => '&#59141;',
               'help' => '&#10067;',
       'circled-help' => '&#59140;',
            'warning' => '&#9888;',
              'cycle' => '&#128260;',
                 'cw' => '&#10227;',
                'ccw' => '&#10226;',
            'shuffle' => '&#128256;',
               'back' => '&#128281;',
         'level-down' => '&#8627;',
            'retweet' => '&#59159;',
               'loop' => '&#128257;',
       'back-in-time' => '&#59249;',
           'level-up' => '&#8624;',
             'switch' => '&#8646;',
      'numbered-list' => '&#57349;',
        'add-to-list' => '&#57347;',
             'layout' => '&#9871;',
               'list' => '&#9776;',
           'text-doc' => '&#128196;',
  'text-doc-inverted' => '&#59185;',
                'doc' => '&#59184;',
               'docs' => '&#59190;',
      'landscape-doc' => '&#59191;',
            'picture' => '&#127748;',
              'video' => '&#127916;',
              'music' => '&#127925;',
             'folder' => '&#128193;',
            'archive' => '&#59392;',
              'trash' => '&#59177;',
             'upload' => '&#128228;',
           'download' => '&#128229;',
               'save' => '&#128190;',
            'install' => '&#59256;',
              'cloud' => '&#9729;',
       'upload-cloud' => '&#59153;',
           'bookmark' => '&#128278;',
          'bookmarks' => '&#128209;',
          'open-book' => '&#128214;',
               'play' => '&#9654;',
               'paus' => '&#8214;',
             'record' => '&#9679;',
               'stop' => '&#9632;',
                 'ff' => '&#9193;',
                 'fb' => '&#9194;',
           'to-start' => '&#9198;',
             'to-end' => '&#9197;',
        'resize-full' => '&#59204;',
       'resize-small' => '&#59206;',
             'volume' => '&#9207;',
              'sound' => '&#128266;',
               'mute' => '&#128263;',
       'flow-cascade' => '&#128360;',
        'flow-branch' => '&#128361;',
          'flow-tree' => '&#128362;',
          'flow-line' => '&#128363;',
      'flow-parallel' => '&#128364;',
          'left-bold' => '&#58541;',
          'down-bold' => '&#58544;',
            'up-bold' => '&#58543;',
         'right-bold' => '&#58542;',
               'left' => '&#11013;',
               'down' => '&#11015;',
                 'up' => '&#11014;',
              'right' => '&#10145;',
       'circled-left' => '&#59225;',
       'circled-down' => '&#59224;',
         'circled-up' => '&#59227;',
      'circled-right' => '&#59226;',
      'triangle-left' => '&#9666;',
      'triangle-down' => '&#9662;',
        'triangle-up' => '&#9652;',
     'triangle-right' => '&#9656;',
       'chevron-left' => '&#59229;',
       'chevron-down' => '&#59228;',
         'chevron-up' => '&#59231;',
      'chevron-right' => '&#59230;',
 'chevron-small-left' => '&#59233;',
 'chevron-small-down' => '&#59232;',
   'chevron-small-up' => '&#59235;',
'chevron-small-right' => '&#59234;',
  'chevron-thin-left' => '&#59237;',
  'chevron-thin-down' => '&#59236;',
    'chevron-thin-up' => '&#59239;',
 'chevron-thin-right' => '&#59238;',
          'left-thin' => '&larr;',
          'down-thin' => '&darr;',
            'up-thin' => '&uarr;',
         'right-thin' => '&rarr;',
        'arrow-combo' => '&#59215;',
         'three-dots' => '&#9206;',
           'two-dots' => '&#9205;',
                'dot' => '&#9204;',
                 'cc' => '&#128325;',
              'cc-by' => '&#128326;',
              'cc-nc' => '&#128327;',
           'cc-nc-eu' => '&#128328;',
           'cc-nc-jp' => '&#128329;',
              'cc-sa' => '&#128330;',
              'cc-nd' => '&#128331;',
              'cc-pd' => '&#128332;',
            'cc-zero' => '&#128333;',
           'cc-share' => '&#128334;',
           'cc-remix' => '&#128335;',
            'db-logo' => '&#128505;',
           'db-shape' => '&#128506;',
             'github' => '&#62208;',
           'c-github' => '&#62209;',
             'flickr' => '&#62211;',
           'c-flickr' => '&#62212;',
              'vimeo' => '&#62214;',
            'c-vimeo' => '&#62215;',
            'twitter' => '&#62217;',
          'c-twitter' => '&#62218;',
           'facebook' => '&#62220;',
         'c-facebook' => '&#62221;',
         's-facebook' => '&#62222;',
            'google+' => '&#62223;',
          'c-google+' => '&#62224;',
          'pinterest' => '&#62226;',
        'c-pinterest' => '&#62227;',
             'tumblr' => '&#62229;',
           'c-tumblr' => '&#62230;',
           'linkedin' => '&#62232;',
         'c-linkedin' => '&#62233;',
           'dribbble' => '&#62235;',
         'c-dribbble' => '&#62236;',
        'stumbleupon' => '&#62238;',
      'c-stumbleupon' => '&#62239;',
             'lastfm' => '&#62241;',
           'c-lastfm' => '&#62242;',
               'rdio' => '&#62244;',
             'c-rdio' => '&#62245;',
            'spotify' => '&#62247;',
          'c-spotify' => '&#62248;',
                 'qq' => '&#62250;',
          'instagram' => '&#62253;',
            'dropbox' => '&#62256;',
           'evernote' => '&#62259;',
             'flattr' => '&#62262;',
              'skype' => '&#62265;',
            'c-skype' => '&#62266;',
             'renren' => '&#62268;',
         'sina-weibo' => '&#62271;',
             'paypal' => '&#62274;',
             'picasa' => '&#62277;',
         'soundcloud' => '&#62280;',
               'mixi' => '&#62283;',
            'behance' => '&#62286;',
     'google-circles' => '&#62289;',
                 'vk' => '&#62292;',
           'smashing' => '&#62295;',
    );

	$array = array();
	foreach($glyphTable as $key => $glyph) {
		$array[] = array("slug"=>htmlspecialchars($glyph), "name"=>$key);		
	}

	return $array;
}


/* -------------------------------------------------------------------------*
 * 							GALLERY IMAGE SELECT							*
 * -------------------------------------------------------------------------*/
 
function ot_gallery_image_select($id, $value) {
	global $post_id,$post;
	if(!$post_id) {
		$post_id = $post->ID;
	}
	?>
	<div id="ot_images_container">
		<ul class="ot_gallery_images">
			<?php
				if ( $value ) {
					$product_image_gallery = $value;
				} else {
					// Backwards compat
					$attachment_ids = get_posts( 'post_parent=' . $post_id . '&numberposts=-1&post_type=attachment&orderby=menu_order&order=ASC&post_mime_type=image&fields=ids&meta_value=0' );
					$attachment_ids = array_diff( $attachment_ids, array( get_post_thumbnail_id() ) );
					$product_image_gallery = implode( ',', $attachment_ids );
				}

				$attachments = array_filter( explode( ',', $product_image_gallery ) );

				if ( $attachments )
					foreach ( $attachments as $attachment_id ) {
						echo '<li class="image" data-attachment_id="' . $attachment_id . '">
							' . wp_get_attachment_image( $attachment_id, array(80,80) ) . '
							<ul class="actions">
								<li><a href="#" class="delete" title="' . esc_html__('Delete image','allegro-theme') . '">' . esc_html__('Delete','allegro-theme') . '</a></li>
							</ul>
						</li>';
					}
			?>
		</ul>

		<input type="hidden" id="<?php echo $id;?>" name="<?php echo $id;?>" value="<?php echo esc_attr( $product_image_gallery ); ?>" />

	</div>
	<p class="add_product_images hide-if-no-js">
		<a href="#"><?php esc_html_e('Add images','allegro-theme'); ?></a>
	</p>
	<script type="text/javascript">
		jQuery(document).ready(function($){

			// Uploading files
			var product_gallery_frame;
			var $image_gallery_ids = $('#<?php echo $id;?>');
			var $df_gallery_images = $('#ot_images_container ul.ot_gallery_images');

			jQuery('.add_product_images').on( 'click', 'a', function( event ) {

				var $el = $(this);
				var attachment_ids = $image_gallery_ids.val();

				event.preventDefault();

				// If the media frame already exists, reopen it.
				if ( product_gallery_frame ) {
					product_gallery_frame.open();
					return;
				}

				// Create the media frame.
				product_gallery_frame = wp.media.frames.downloadable_file = wp.media({
					// Set the title of the modal.
					title: '<?php esc_html_e('Add Images to Product Gallery','allegro-theme'); ?>',
					button: {
						text: '<?php esc_html_e('Add to gallery','allegro-theme'); ?>',
					},
					multiple: true
				});

				// When an image is selected, run a callback.
				product_gallery_frame.on( 'select', function() {

					var selection = product_gallery_frame.state().get('selection');

					selection.map( function( attachment ) {

						attachment = attachment.toJSON();

						if ( attachment.id ) {
							attachment_ids = attachment_ids ? attachment_ids + "," + attachment.id : attachment.id;

							$df_gallery_images.append('\
								<li class="image" data-attachment_id="' + attachment.id + '">\
									<img src="' + attachment.url + '" width="80" height="80"/>\
									<ul class="actions">\
										<li><a href="#" class="delete" title="<?php esc_html_e('Delete image','allegro-theme'); ?>"><?php esc_html_e('Delete','allegro-theme'); ?></a></li>\
									</ul>\
								</li>');
						}

					} );

					$image_gallery_ids.val( attachment_ids );
				});

				// Finally, open the modal.
				product_gallery_frame.open();
			});

			// Image ordering
			$df_gallery_images.sortable({
				items: 'li.image',
				cursor: 'move',
				scrollSensitivity:40,
				forcePlaceholderSize: true,
				forceHelperSize: false,
				helper: 'clone',
				opacity: 0.65,
				placeholder: 'wc-metabox-sortable-placeholder',
				start:function(event,ui){
					ui.item.css('background-color','#f6f6f6');
				},
				stop:function(event,ui){
					ui.item.removeAttr('style');
				},
				update: function(event, ui) {
					var attachment_ids = '';

					$('#ot_images_container ul li.image').css('cursor','default').each(function() {
						var attachment_id = jQuery(this).attr( 'data-attachment_id' );
						attachment_ids = attachment_ids + attachment_id + ',';
					});

					$image_gallery_ids.val( attachment_ids );
				}
			});

			// Remove images
			$('#ot_images_container').on( 'click', 'a.delete', function() {

				$(this).closest('li.image').remove();

				var attachment_ids = '';

				$('#ot_images_container ul li.image').css('cursor','default').each(function() {
					var attachment_id = jQuery(this).attr( 'data-attachment_id' );
					attachment_ids = attachment_ids + attachment_id + ',';
				});

				$image_gallery_ids.val( attachment_ids );

				return false;
			} );

		});
	</script>
	<?php

}

/* -------------------------------------------------------------------------*
 * 								WIDGET COUNTER								*
 * -------------------------------------------------------------------------*/
 
function widget_first_last_classes($params) {

	global $my_widget_num; // Global a counter array
	$this_id = $params[0]['id']; // Get the id for the current sidebar we're processing
	$arr_registered_widgets = wp_get_sidebars_widgets(); // Get an array of ALL registered widgets	

	if(!$my_widget_num) {// If the counter array doesn't exist, create it
		$my_widget_num = array();
	}

	if(!isset($arr_registered_widgets[$this_id]) || !is_array($arr_registered_widgets[$this_id])) { // Check if the current sidebar has no widgets
		return $params; // No widgets in this sidebar... bail early.
	}

	if(isset($my_widget_num[$this_id])) { // See if the counter array has an entry for this sidebar
		$my_widget_num[$this_id] ++;
	} else { // If not, create it starting with 1
		$my_widget_num[$this_id] = 1;
	}

	$class = 'class="widget-' . $my_widget_num[$this_id] . ' '; // Add a widget number class for additional styling options

	if($my_widget_num[$this_id] == 1) { // If this is the first widget
		$class .= 'first ';
	} elseif($my_widget_num[$this_id] == count($arr_registered_widgets[$this_id])) { // If this is the last widget
		$class .= 'last ';
	}

	$params[0]['before_widget'] = str_replace('class="', $class, $params[0]['before_widget']); // Insert our new classes into "before widget"

	return $params;

}

function orange_themes_follow() {
		echo "<!-- BEGIN .follow -->";
		echo "<div class=\"follow\">";
			echo "<p>Follow Orange Themes</p>";
			echo "<a href=\"http://themeforest.net/user/orange-themes?ref=orange-themes\" class=\"themeforest\" target=\"blank\">Theme Forest</a>";
			echo "<a href=\"http://twitter.com/#!/orangethemes\" class=\"twitter\" target=\"blank\">Twitter</a>";
			echo "<a href=\"http://www.orange-themes.com/\" class=\"orangethemes\" target=\"blank\">Orange-Themes.com</a>";
		echo "<!-- END .follow -->";
		echo "</div>";
	}	
	
function orange_themes_info_message($content) {
	?>
	<a href="javascript:{}" class="help"><img src="<?php echo THEME_IMAGE_CPANEL_URL; ?>ico-help-1.png" /></a>
	<i class="popup-help popup-help-hidden trans-1">
		<a href="javascript:{}" class="close"></a>
		<?php echo $content; ?>
	</i>
	<?php
}
	
$uploadsdir=wp_upload_dir();
define("THEME_UPLOADS_URL", $uploadsdir['url']);




/* -------------------------------------------------------------------------*
 * 							WEATHER FORECAST								*
 * -------------------------------------------------------------------------*/
 
function OT_weather_forecast($ip) {
	$locationType = get_option(THEME_NAME."_weather_location_type");
	if($locationType == "custom") {
		$whitelist = array();
	} else {
		$whitelist = array('localhost', '127.0.0.1');
	}

	$weather_api = get_option(THEME_NAME."_weather_api_2");
	$weather_api_key_type = get_option(THEME_NAME."_weather_api_key_type");
	if($weather_api) {
		if(!in_array($_SERVER['HTTP_HOST'], $whitelist)){
			if($locationType == "custom") {
				$result = true;
			} else {
				$url = "http://www.geoplugin.net/json.gp?ip=".$ip;
				$result = json_response($url);
			}

			if($result!=false) {
				if($locationType == "custom") {
					$city = false;
					$country = false;
					$weatherResult = get_transient('weather_result_'.urlencode($ip));
				} else {
					$city = $result->geoplugin_city;
					$country = $result->geoplugin_countryName;
					$weatherResult = get_transient('weather_result_'.urlencode($city).'_'.urlencode($country));
				}

				
				if($weatherResult==false) {
					$temperature = get_option(THEME_NAME."_temperature");
					

					if($city) {
						if($weather_api_key_type=="premium") {
							$url = "http://api.worldweatheronline.com/premium/v2/weather.ashx?key=".$weather_api."&q=".urlencode($city).",".urlencode($country)."&num_of_days=1&includeLocation=yes&date=today&format=json";
						} else {
							$url = "http://api.worldweatheronline.com/free/v2/weather.ashx?key=".$weather_api."&q=".urlencode($city).",".urlencode($country)."&num_of_days=1&includeLocation=yes&date=today&format=json";
						}				
						$result = json_response($url);
					} else {
						if($weather_api_key_type=="premium") {
							$url = "http://api.worldweatheronline.com/premium/v2/weather.ashx?key=".$weather_api."&q=".$ip."&num_of_days=1&includeLocation=yes&date=today&format=json";
						} else {
							$url = "http://api.worldweatheronline.com/free/v2/weather.ashx?key=".$weather_api."&q=".$ip."&num_of_days=1&includeLocation=yes&date=today&format=json";
						}
						$result = json_response($url);
					}
				
					if($result!=false) {
						$weather = array();

			
						$weather['temp_F'] = $result->data->current_condition[0]->temp_F;	
						$weather['temp_C'] = $result->data->current_condition[0]->temp_C;
						
						// temperature color
						if ($weather['temp_C'] <= -25) {
							$weather['color'] = "#1c87c4";
						} else if ($weather['temp_C'] > -25 && $weather['temp_C'] < -10) {
							$weather['color'] = "#7ebecc";
						} else if ($weather['temp_C'] >= -10 && $weather['temp_C'] <= 4) {
							$weather['color'] = "#bbbaa7";
						} else if ($weather['temp_C'] > 5 && $weather['temp_C'] < 25) {
							$weather['color'] = "#e87c2d";
						}  else if ($weather['temp_C'] >= 25) {
							$weather['color'] = "#e33f24";
						} 
						
						// add + before 
						$weather['temp_F'] = intval($weather['temp_F']);
						if($weather['temp_F']>0) {
							$weather['temp_F'] = "+".$weather['temp_F'];
						} else {
							$weather['temp_F'];
						}				

						// add + before 
						$weather['temp_C'] = intval($weather['temp_C']);
						if($weather['temp_C']>0) {
							$weather['temp_C'] = "+".$weather['temp_C'];
						} else {
							$weather['temp_C'];
						}

						$weather['temp_F'] = $weather['temp_F'].'&deg;F';
						$weather['temp_C'] = $weather['temp_C'].'&deg;C';

						$weatherCode = $result->data->current_condition[0]->weatherCode;
						$weather['city'] = $result->data->nearest_area[0]->areaName[0]->value;
						$weather['country'] = $result->data->nearest_area[0]->country[0]->value;


						switch ($weatherCode) {
							case '395':
								$weather['image'] = "weather-snow";
								$weather['weatherDesc'] = esc_html__('Moderate or heavy snow in area with thunder','allegro-theme');
								break;
							case '392':
								$weather['image'] = "weather-snow";
								$weather['weatherDesc'] = esc_html__('Patchy light snow in area with thunder','allegro-theme');
								break;
							case '371':
								$weather['image'] = "weather-snow";
								$weather['weatherDesc'] = esc_html__('Moderate or heavy snow showers','allegro-theme');
								break;
							case '368':
								$weather['image'] = "weather-snow";
								$weather['weatherDesc'] = esc_html__('Light snow showers','allegro-theme');
								break;
							case '350':
								$weather['image'] = "weather-snow";
								$weather['weatherDesc'] = esc_html__('Ice pellets','allegro-theme');
								break;
							case '338':
								$weather['image'] = "weather-snow";
								$weather['weatherDesc'] = esc_html__('Heavy snow','allegro-theme');
								break;
							case '335':
								$weather['image'] = "weather-snow";
								$weather['weatherDesc'] = esc_html__('Patchy heavy snow','allegro-theme');
								break;
							case '332':
								$weather['image'] = "weather-snow";
								$weather['weatherDesc'] = esc_html__('Moderate snow','allegro-theme');
								break;
							case '329':
								$weather['image'] = "weather-snow";
								$weather['weatherDesc'] = esc_html__('Patchy moderate snow','allegro-theme');
								break;
							case '326':
								$weather['image'] = "weather-snow";
								$weather['weatherDesc'] = esc_html__('Light snow','allegro-theme');
								break;
							case '323':
								$weather['image'] = "weather-snow";
								$weather['weatherDesc'] = esc_html__('Patchy light snow','allegro-theme');
								break;
							case '320':
								$weather['image'] = "weather-snow";
								$weather['weatherDesc'] = esc_html__('Moderate or heavy sleet','allegro-theme');
								break;
							case '317':
								$weather['image'] = "weather-snow";
								$weather['weatherDesc'] = esc_html__('Light sleet','allegro-theme');
								break;
							case '284':
								$weather['image'] = "weather-snow";
								$weather['weatherDesc'] = esc_html__('Heavy freezing drizzle','allegro-theme');
								break;
							case '281':
								$weather['image'] = "weather-snow";
								$weather['weatherDesc'] = esc_html__('Freezing drizzle','allegro-theme');
								break;
							case '266':
								$weather['image'] = "weather-snow";
								$weather['weatherDesc'] = esc_html__('Light drizzle','allegro-theme');
								break;
							case '263':
								$weather['image'] = "weather-snow";
								$weather['weatherDesc'] = esc_html__('Patchy light drizzle','allegro-theme');
								break;
							case '230':
								$weather['image'] = "weather-snow";
								$weather['weatherDesc'] = esc_html__('Blizzard','allegro-theme');
								break;
							case '227':
								$weather['image'] = "weather-snow";
								$weather['weatherDesc'] = esc_html__('Blowing snow','allegro-theme');
								break;
							case '389':
								$weather['image'] = "weather-thunder";
								$weather['weatherDesc'] = esc_html__('Moderate or heavy rain in area with thunder','allegro-theme');
								break;
							case '386':
								$weather['image'] = "weather-thunder";
								$weather['weatherDesc'] = esc_html__('Patchy light rain in area with thunder','allegro-theme');
								break;
							case '200':
								$weather['image'] = "weather-thunder";
								$weather['weatherDesc'] = esc_html__('Thundery outbreaks in nearby','allegro-theme');
								break;
							case '377':
								$weather['image'] = "weather-rain";
								$weather['weatherDesc'] = esc_html__('Moderate or heavy showers of ice pellets','allegro-theme');
								break;
							case '374':
								$weather['image'] = "weather-rain";
								$weather['weatherDesc'] = esc_html__('Light showers of ice pellets','allegro-theme');
								break;
							case '365':
								$weather['image'] = "weather-rain";
								$weather['weatherDesc'] = esc_html__('Moderate or heavy sleet showers','allegro-theme');
								break;
							case '362':
								$weather['image'] = "weather-rain";
								$weather['weatherDesc'] = esc_html__('Light sleet showers','allegro-theme');
								break;
							case '359':
								$weather['image'] = "weather-rain";
								$weather['weatherDesc'] = esc_html__('Torrential rain shower','allegro-theme');
								break;
							case '356':
								$weather['image'] = "weather-rain";
								$weather['weatherDesc'] = esc_html__('Moderate or heavy rain shower','allegro-theme');
								break;
							case '353':
								$weather['image'] = "weather-rain";
								$weather['weatherDesc'] = esc_html__('Light rain shower','allegro-theme');
								break;
							case '314':
								$weather['image'] = "weather-rain";
								$weather['weatherDesc'] = esc_html__('Moderate or Heavy freezing rain','allegro-theme');
								break;
							case '311':
								$weather['image'] = "weather-rain";
								$weather['weatherDesc'] = esc_html__('Light freezing rain','allegro-theme');
								break;
							case '308':
								$weather['image'] = "weather-rain";
								$weather['weatherDesc'] = esc_html__('Heavy rain','allegro-theme');
								break;
							case '305':
								$weather['image'] = "weather-rain";
								$weather['weatherDesc'] = esc_html__('Heavy rain at times','allegro-theme');
								break;
							case '302':
								$weather['image'] = "weather-rain";
								$weather['weatherDesc'] = esc_html__('Moderate rain','allegro-theme');
								break;
							case '299':
								$weather['image'] = "weather-rain";
								$weather['weatherDesc'] = esc_html__('Moderate rain at times','allegro-theme');
								break;
							case '296':
								$weather['image'] = "weather-rain";
								$weather['weatherDesc'] = esc_html__('Light rain','allegro-theme');
								break;
							case '293':
								$weather['image'] = "weather-rain";
								$weather['weatherDesc'] = esc_html__('Patchy light rain','allegro-theme');
								break;
							case '185':
								$weather['image'] = "weather-rain";
								$weather['weatherDesc'] = esc_html__('Patchy freezing drizzle nearby','allegro-theme');
								break;
							case '179':
								$weather['image'] = "weather-rain";
								$weather['weatherDesc'] = esc_html__('Patchy snow nearby','allegro-theme');
								break;
							case '176':
								$weather['image'] = "weather-rain";
								$weather['weatherDesc'] = esc_html__('Patchy rain nearby','allegro-theme');
								break;
							case '260':
								$weather['image'] = "weather-cloudy";
								$weather['weatherDesc'] = esc_html__('Freezing fog','allegro-theme');
								break;
							case '248':
								$weather['image'] = "weather-cloudy";
								$weather['weatherDesc'] = esc_html__('Fog','allegro-theme');
								break;
							case '143':
								$weather['image'] = "weather-cloudy";
								$weather['weatherDesc'] = esc_html__('Mist','allegro-theme');
								break;
							case '122':
								$weather['image'] = "weather-cloudy";
								$weather['weatherDesc'] = esc_html__('Overcast','allegro-theme');
								break;
							case '119':
								$weather['image'] = "weather-cloudy";
								$weather['weatherDesc'] = esc_html__('Cloudy','allegro-theme');
								break;
							case '116':
								$weather['image'] = "weather-clouds";
								$weather['weatherDesc'] = esc_html__('Partly Cloudy','allegro-theme');
								break;
							case '113':
								$weather['image'] = "weather-sun";
								$weather['weatherDesc'] = esc_html__('Sunny','allegro-theme');
								break;
							case '182':
								$weather['image'] = "weather-sleet";
								$weather['weatherDesc'] = esc_html__('Patchy sleet nearby','allegro-theme');
								break;
							default:
								$weather['image'] = "weather-default";
								$weather['weatherDesc'] = esc_html__('Can\'t get any data.','allegro-theme');
								break;
						}

						//set wp cache
						if($locationType == "custom") {
							set_transient('weather_result_'.urlencode($ip), $weather, 3600 );
						} else {
							set_transient( 'weather_result_'.urlencode($city).'_'.urlencode($country), $weather, 3600 );
						}
						
					} else {
						$weather['error'] = esc_html__("Something went wrong with the connection!",'allegro-theme');
					}
				} else {
					//get wp cache
					if($locationType == "custom") {
						$weather = get_transient('weather_result_'.urlencode($ip));
					} else {
						$weather = get_transient('weather_result_'.urlencode($city).'_'.urlencode($country));
					}

				}
			} else {
				$weather['error'] = esc_html__("Something went wrong with the connection!",'allegro-theme');
			}
		} else {
			$weather['error'] = esc_html__("This option doesn't work on localhost!",'allegro-theme');
		}
	} else {

		$weather['error'] = esc_html__("Please set up your API key!",'allegro-theme');

	}
	return $weather;
}

/* -------------------------------------------------------------------------*
 * 								NEWS PAGE TITLE								*
 * -------------------------------------------------------------------------*/
 
function ot_page_title() {
	$post_type = get_post_type();
	if(!is_archive() && !is_category() && !is_search() && $post_type!=OT_POST_GALLERY) {
		$title = get_the_title(OT_page_id());
	} else if(is_single() && $post_type==OT_POST_GALLERY) {
		$galID = ot_get_page("gallery");
		$title = get_the_title($galID[0]);
	}  else if(is_search()) {
		$title = esc_html__("Search Results for",'allegro-theme')." \"".remove_html($_GET['s'])."\"";
	} else if(is_category()) {
		$category = get_category( get_query_var( 'cat' ) );
		$cat_id = $category->cat_ID;
		$catName = get_category($cat_id )->name;
		$title = $catName;
	} else if (is_author()) {
		$curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
		$title = esc_html__("Posts From",'allegro-theme'). " ".$curauth->display_name;
	} else if(is_tag()) {
		$category = single_tag_title('',false);
		$title =  esc_html__("Tag",'allegro-theme')." \"".$category."\"";
	} else if(is_archive()) {
		$title = esc_html__("Archive",'allegro-theme');
	}
	echo $title;
}

/* -------------------------------------------------------------------------*
 * 							CONTENT CLASS							*
 * -------------------------------------------------------------------------*/
 
function OT_content_class($id) {
	wp_reset_query();
	if(is_category()) {
		$catId = get_cat_id( single_cat_title("",false) );
		$sidebarPosition = get_option ( THEME_NAME."_sidebar_position" ); 
		$sidebarPositionCustom = ot_get_option ( $catId, "sidebar_position"); 
	} else {
		$sidebarPosition = get_option ( THEME_NAME."_sidebar_position" ); 
		$sidebarPositionCustom = get_post_meta ( $id, THEME_NAME."_sidebar_position", true ); 
	}
	
	if( $sidebarPosition == "left" || ( $sidebarPosition == "custom" && $sidebarPositionCustom == "left") ) { 
		$contentClass = "right";
	} else if( $sidebarPosition == "right" || ( $sidebarPosition == "custom" && $sidebarPositionCustom == "right") ) { 
		$contentClass = "left";
	} else if ( $sidebarPosition == "custom" && !$sidebarPositionCustom ) { 
		$contentClass = "left";
	} else {
		$contentClass = "left";
	}
	echo $contentClass;
}
/* -------------------------------------------------------------------------*
 * 								SIDEBAR CLASS								*
 * -------------------------------------------------------------------------*/
 
function OT_sidebarClass($id){
	wp_reset_query();
	if(is_category()) {
		$catId = get_cat_id( single_cat_title("",false) );
		$sidebarPosition = get_option ( THEME_NAME."_sidebar_position" ); 
		$sidebarPositionCustom = ot_get_option ( $catId, "sidebar_position"); 
	} else {
		$sidebarPosition = get_option ( THEME_NAME."_sidebar_position" ); 
		$sidebarPositionCustom = get_post_meta ( $id, THEME_NAME."_sidebar_position", true ); 
	}
	if($sidebarPosition=="left" || ( $sidebarPosition == "custom" &&  $sidebarPositionCustom == "left") ) { $sidebarClass = 'left'; } else { $sidebarClass = 'right'; } 
    echo $sidebarClass;
}

/* -------------------------------------------------------------------------*
 * 							GET PAGE ID										*
 * -------------------------------------------------------------------------*/
 
function OT_page_id() {
	$page_id = get_queried_object_id();

	if(isset($page_id) && $page_id!=0) {
		return $page_id;	
	} elseif(ot_is_woocommerce_activated() == true) {
		return woocommerce_get_page_id('shop');
	}

}

/* -------------------------------------------------------------------------*
 * 							UPDATE POST VIEW COUNT							*
 * -------------------------------------------------------------------------*/
 
function OT_setPostViews() {
	global $post;
	if(is_single() && isset($post)) {
		$postID = $post->ID;
		$count_key = THEME_NAME.'_post_views_count';
		$count = get_post_meta($postID, $count_key, true);
		
		if ( !current_user_can( 'manage_options' ) && !isset($_COOKIE[THEME_NAME."_post_views_count_".$postID])) {
			if ( $count=='' ) {
				delete_post_meta($postID, $count_key);
				add_post_meta($postID, $count_key, '0');
			} else {
				$count++;
				update_post_meta($postID, $count_key, $count, $count-1);
			}
			
			setcookie(THEME_NAME."_post_views_count_".$postID, "1", time()+2678400); 
		}

	}
}

/* -------------------------------------------------------------------------*
 * 							GET POST VIEW COUNT								*
 * -------------------------------------------------------------------------*/
 
function OT_getPostViews($postID){
    $count_key = THEME_NAME.'_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
   
   if( $count=='' ){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
	
    return $count;
}


/* -------------------------------------------------------------------------*
 * 								POST TYPE								*
 * -------------------------------------------------------------------------*/
 
	function OT_post_type($post_type) {
		switch ($post_type) {
			case "blog":
				$post_type="post";
				break;
			case "gallery":
				$post_type="gallery";
				break;
			case "all":
				$post_type=array("post","gallery");
				break;
			default:
				$post_type="post";
		}
		return $post_type;
	}

 /* -------------------------------------------------------------------------*
 * 						ADD CUSTOM TEXT FORMATTING BUTTONS					*
 * -------------------------------------------------------------------------*/
global $orangethemes_buttons;
$orangethemes_buttons=array("orangethemesbutton", "orangethemesspacer", "orangethemesquote", "|",
			 "orangethemeslists", "|","orangethemesvideo" ,"orangethemesmarker","orangethemestabs","orangethemessocial", "|",
			 "orangethemesgallery", "orangethemescaption", "|", "orangethemesparagraph", "orangethemesparagraph2", "orangethemesparagraph5", "orangethemesparagraph3", "orangethemesparagraph4", "orangethemesalert", "orangethemesaccordion", "orangethemestoggles", "|","orangethemesbreak");

function add_orangethemes_buttons() {
   if ( get_user_option('rich_editing') == 'true') {
     add_filter('mce_external_plugins', 'add_orangethemes_btn_tinymce_plugin');
     add_filter('mce_buttons_3', 'register_orangethemes_buttons');
   }
}

function register_orangethemes_buttons($buttons) {
	global $orangethemes_buttons;
		
   array_push($buttons, implode(",",$orangethemes_buttons));
   return $buttons;
}

function add_orangethemes_btn_tinymce_plugin($plugin_array) {
	global $orangethemes_buttons;
	
	foreach($orangethemes_buttons as $btn){
		$plugin_array[$btn] = THEME_ADMIN_URL.'buttons-formatting/editor-plugin.js';
	}
	return $plugin_array;

}
 
 
 /* ------------------------------------------------------------------------*
 * 							OTHER THEMES									*
 * -------------------------------------------------------------------------*/
 
 function other_themes () {
?>
		<!-- BEGIN more-orange-themes -->
		<div class="more-orange-themes">

			<div class="header">
				<img src="<?php echo THEME_IMAGE_MTHEMES_URL; ?>title-more-themes.png" alt="" width="447" height="23" />
				<p>
					<a href="http://www.themeforest.net/user/orange-themes/portfolio?ref=orange-themes" class="btn-1" target="_blank"><span><u class="themeforest">Check our portfolio at themeforest.net</u></span></a>
					<a href="http://www.twitter.com/#!/orangethemes" class="btn-1" target="_blank"><span><u class="twitter">Follow us on twitter</u></span></a>
					<a href="http://www.orange-themes.com" class="btn-1" target="_blank"><span><u class="orangethemes">Orange-themes.com</u></span></a>
				</p>
			</div>

			<?php 
				$xml = theme_get_latest_theme_version(THEME_NOTIFIER_CACHE_INTERVAL); 
				foreach ( $xml->item as $entry ) {
				$title = explode("Private: ", $entry->title);
			?>
			
			<!-- BEGIN .item -->
			<div class="item">
				<div class="image">
					<a href="<?php echo $entry->purchase; ?>"><img src="<?php echo $entry->image; ?>" /></a>
				</div>
				<div class="text">
					<h2><a href="<?php echo $entry->purchase; ?>"><?php echo $title[1]; ?></a></h2>
					<p><?php echo $entry->content; ?></p>
					<p class="link"><a href="<?php echo $entry->demo; ?>" target="_blank">Demo website</a></p>
					<p class="link"><a href="<?php echo $entry->purchase; ?>" target="_blank">Purchase at ThemeForest.net</a></p>
					<?php if ( $entry->html ) { ?>
						<p class="link"><a href="<?php echo $entry->html; ?>" target="_blank">HTML version</a></p>
					<?php } ?>
				</div>
			<!-- END .item -->
			</div>
			<?php } ?> 
			
		<!-- END more-orange-themes -->
		</div>
<?php
	
}

/* -------------------------------------------------------------------------*
 * 							COUNT ATTACHMENTS								*
 * -------------------------------------------------------------------------*/
 
function OT_attachment_count($post_id = false) {
	global $post;
    //Get all attachments
    $attachments = get_posts( array(
        'post_type' => 'attachment',
        'posts_per_page' => -1
    ) );

    $att_count = 0;
    if ( $attachments ) {
        foreach ( $attachments as $attachment ) {
            // Check for the post type based on individual attachment's parent
            if ( OT_POST_GALLERY == get_post_type($attachment->post_parent) && $post_id == $attachment->post_parent ) {
                $att_count = $att_count + 1;
            } else if (OT_POST_GALLERY == get_post_type($attachment->post_parent) && $post_id == false) {
				$att_count = $att_count + 1;
			}
        }
    }
	 return $att_count;
}
/* -------------------------------------------------------------------------*
 * 							GALLERY IMAGE COUNT								*
 * -------------------------------------------------------------------------*/
 
function OT_image_count($post_id = false) {
    //Get all images
   	$galleryImages = get_post_meta ( $post_id, THEME_NAME."_gallery_images", true ); 
   	$imageIDs = explode(",",$galleryImages);
   	$att_count = count(array_filter($imageIDs));

	return $att_count;
}

/* -------------------------------------------------------------------------*
 * 							CHECK PAGE TEMPLATE								*
 * -------------------------------------------------------------------------*/
 
function is_pagetemplate_active($pagetemplate = '') {
	global $wpdb;
	$sql = "select meta_key from $wpdb->postmeta where meta_key like '_wp_page_template' and meta_value like '" . $pagetemplate . "'";
	$result = $wpdb->query($sql);
	if ($result) {
		return TRUE;
	} else {
		return FALSE;
	}
}
/* -------------------------------------------------------------------------*
 * 								HEX -> RGB								*
 * -------------------------------------------------------------------------*/
 
function OTHexToRGB($hex) {
		$hex = ereg_replace("#", "", $hex);
		$color = array();
 
		if(strlen($hex) == 3) {
			$color['r'] = hexdec(substr($hex, 0, 1) . $r);
			$color['g'] = hexdec(substr($hex, 1, 1) . $g);
			$color['b'] = hexdec(substr($hex, 2, 1) . $b);
		}
		else if(strlen($hex) == 6) {
			$color['r'] = hexdec(substr($hex, 0, 2));
			$color['g'] = hexdec(substr($hex, 2, 2));
			$color['b'] = hexdec(substr($hex, 4, 2));
		}
 
		return $color;
}

/* -------------------------------------------------------------------------*
 * 							PRASE SHORTCODE									*
 * -------------------------------------------------------------------------*/
 
function parse_shortcode_content( $content ) {

   /* Parse nested shortcodes and add formatting. */
    $content = trim( do_shortcode( shortcode_unautop( $content ) ) );

    /* Remove '' from the start of the string. */
    if ( substr( $content, 0, 4 ) == '' )
        $content = substr( $content, 4 );

    /* Remove '' from the end of the string. */
    if ( substr( $content, -3, 3 ) == '' )
        $content = substr( $content, 0, -3 );

    /* Remove any instances of ''. */
    $content = str_replace( array( '<p></p>' ), '', $content );
    $content = str_replace( array( '<p>  </p>' ), '', $content );

    return $content;
}

/* -------------------------------------------------------------------------*
 * 								GET GOOGLE FONTS							*
 * -------------------------------------------------------------------------*/
 
function OT_get_google_fonts($sort = "alpha") {

	$font_list = get_option(THEME_NAME."_google_font_list");
	$font_list_time = get_option(THEME_NAME."_google_font_list_update");
	$now = time();
	$interval = 41600;
	
	if($font_list) {
		$font_list = $font_list;
	} else if(!$font_list || (( $now - $font_list_time ) > $interval)) {
		$url = "https://www.googleapis.com/webfonts/v1/webfonts?key=AIzaSyCpatq_HIaUbw1XUxVAellP4M1Uoa6oibU&sort=" . $sort;
		$result = json_response( $url );
		if($result!=false) {
			$font_list = array();
			foreach ( $result->items as $font ) {

				$font_list[] .= $font->family;
				
			}
		update_option(THEME_NAME."_google_font_list",$font_list);
		update_option(THEME_NAME."_google_font_list_update",time());
		} else {
			$font_list = false;
		}

	} else {
		$font_list = false;
	}
		
	return $font_list;
	
}
/* -------------------------------------------------------------------------*
 * 								JSON RESPONSE								*
 * -------------------------------------------------------------------------*/
 
if ( ! function_exists( 'json_response' ) )	{

	function json_response( $url )	{
			$args = array(
				 'timeout' => '10',
				 'redirection' => '10',
				 'sslverify' => false // for localhost
			);
			
			# Parse the given url
			$raw = wp_remote_get( $url, $args );
			if (!isset($raw->errors) && $raw['body']) {	
				$decoded = json_decode( $raw['body'] );
				return $decoded;
			} else {

				return $url;	
				//return false;	
			}

	}

}
/* -------------------------------------------------------------------------*
 * 								USER COMMENT COUNT							*
 * -------------------------------------------------------------------------*/
 
function OT_user_comment_count( $user_id )	{
	global $wpdb;
	$where = 'WHERE comment_approved = 1 AND user_id = ' . $user_id ;
	$comment_count = $wpdb->get_var(
		"SELECT COUNT( * ) AS total
			FROM {$wpdb->comments}
			{$where}
		");

	return $comment_count;
}

/* -------------------------------------------------------------------------*
 * 								MENU CARD QUERY								*
 * -------------------------------------------------------------------------*/
 
function ot_menu_card_query( $categories )	{
	global $woocommerce;

    add_filter('excerpt_length', 'new_excerpt_length_16');
    $postContents = array();
    $c=0;
    $catCount = 0;
    $postInPage = 0;
    $catOld = null;
	if(!empty($categories)) {
	    foreach($categories as $cat) {
			if(!is_page_template ( 'template-homepage.php' )) { 
				$cat = $cat->term_id;
			}


		    $query_args = array(
		    	'posts_per_page' => -1, 
		    	'post_status' => 'publish', 
		    	'post_type' => 'product',
		   		'tax_query' => array(
					array(
						'taxonomy' => 'product_cat',
						'field' => 'id',
						'terms' => $cat
					)
				),
				'meta_query' => array(
				    array(
				        'key' => THEME_NAME.'_menu',
				        'value'   => 'yes'
				    )
				)
		    );


		    $query_args['meta_query'][] = $woocommerce->query->stock_status_meta_query();

		    $query_args['meta_query']   = array_filter( $query_args['meta_query'] );

			$r = new WP_Query($query_args);
			
			$cc=0;
			
			if ( $r->have_posts() ) :
			
	    		$catNew = get_term_by('id', $cat, "product_cat");
	    		$catNew=$catNew->name;
	    		if($catNew!=$catOld) {
	    			$catCount++;
	    		}

		        while ( $r->have_posts() ) : $r->the_post(); 
		   			global $product;
		    		$postInPage++;

		    		$postContents[$c][$cc]["item_count"] = $r->post_count;
		    		$postContents[$c][$cc]["cat_name"] = $catNew;
		    		$postContents[$c][$cc]["item_title"] = get_the_title();
		    		$postContents[$c][$cc]["item_permalink"] = get_permalink();
		    		$postContents[$c][$cc]["item_excerpt"] = get_the_excerpt();
		    		$postContents[$c][$cc]["item_price"] = $product->get_price_html();
		    		$image = get_post_thumb($r->post->ID,105,105); 
		    		$postContents[$c][$cc]["item_image"] = $image['src'];

					if ( ! $product->is_in_stock() ) : 
						$postContents[$c][$cc]["item_button"] = '<a href="'.apply_filters( "out_of_stock_add_to_cart_url", get_permalink( $product->id ) ).'" class="button product-button"><span class="icon-text">&#9656;</span>'.apply_filters( "out_of_stock_add_to_cart_text", esc_html__("Read More",'allegro-theme') ).'</a>';
					else : 

							$link = array(
								'url'   => '',
								'label' => '',
								'class' => '',
								'icon' => ''
							);

							$handler = apply_filters( 'woocommerce_add_to_cart_handler', $product->product_type, $product );

							switch ( $handler ) {
								case "variable" :
									$link['url'] 	= apply_filters( 'variable_add_to_cart_url', get_permalink( $product->id ) );
									$link['label'] 	= apply_filters( 'variable_add_to_cart_text', esc_attr__('Select options','allegro-theme') );
									$link['icon']  = '&#9881;';
								break;
								case "grouped" :
									$link['url'] 	= apply_filters( 'grouped_add_to_cart_url', get_permalink( $product->id ) );
									$link['label'] 	= apply_filters( 'grouped_add_to_cart_text', esc_attr__('View options','allegro-theme') );
									$link['icon']  = '&#9881;';
								break;
								case "external" :
									$link['url'] 	= apply_filters( 'external_add_to_cart_url', get_permalink( $product->id ) );
									$link['label'] 	= apply_filters( 'external_add_to_cart_text', esc_attr__('Read More','allegro-theme') );
									$link['icon']  = '&#9656;';
								break;
								default :
									if ( $product->is_purchasable() ) {
										$link['url'] 	= apply_filters( 'add_to_cart_url', esc_url( $product->add_to_cart_url() ) );
										$link['label'] 	= apply_filters( 'add_to_cart_text', esc_attr__('Add to cart','allegro-theme') );
										$link['class']  = apply_filters( 'add_to_cart_class', 'add_to_cart_button' );
										$link['icon']  = '&#59197;';
									} else {
										$link['url'] 	= apply_filters( 'not_purchasable_url', get_permalink( $product->id ) );
										$link['label'] 	= apply_filters( 'not_purchasable_text', esc_attr__('Read More','allegro-theme') );
										$link['icon']  = '&#9656;';
									}
								break;
							}

							$postContents[$c][$cc]["item_button"] = apply_filters( 'woocommerce_loop_add_to_cart_link', sprintf('<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="%s button product_type_%s product-button"><span class="icon-text">%s</span>%s</a>', esc_url( $link['url'] ), esc_attr( $product->id ), esc_attr( $product->get_sku() ), esc_attr( $link['class'] ), esc_attr( $product->product_type ), $link['icon'], esc_html( $link['label'] ) ), $product, $link );
							$catOld = $catNew;
					endif;

		    		$cc++;
		        endwhile;
		        $c++;
			endif;
			
	    }
	}

	remove_filter('excerpt_length', 'new_excerpt_length_16');

	return array('postContents' => $postContents,'catCount' => $catCount, 'postInPage' => $postInPage);
}
/* -------------------------------------------------------------------------*
 * 								MENU NAME									*
 * -------------------------------------------------------------------------*/
 
function OT_et_theme_menu_name( $theme_location ) {
	if( ! $theme_location ) return false;
 
	$theme_locations = get_nav_menu_locations();
	if( ! isset( $theme_locations[$theme_location] ) ) return false;
 
	$menu_obj = get_term( $theme_locations[$theme_location], 'nav_menu' );
	if( ! $menu_obj ) $menu_obj = false;
	if( ! isset( $menu_obj->name ) ) return false;
 
	return $menu_obj->name;
}

/* -------------------------------------------------------------------------*
 * 								SUBMENU										*
 * -------------------------------------------------------------------------*/
function OT_submenu() {
	$subCats = array();
	$menu = false;
	
	if(is_category()) {
		$currentCategory = get_category( get_query_var( 'cat' ) );
		$currentID = $currentCategory->cat_ID;

		if(isset($currentCategory)) {
			
			if(isset($currentCategory->category_parent) && $currentCategory->category_parent!=0) {
				$catID = $currentCategory->category_parent;
			} else {
				$catID = $currentID;
			}
	
			$cats = get_categories(array('child_of' => $catID, 'hide_empty' => 0));												
			foreach ($cats as $cat) {
				$subCats[] = array(
					'url'		=> get_category_link( $cat->cat_ID ),
					'name'		=> $cat->name
				);
			}
		}
	} else if (is_single()) {
		$thisCategory = get_the_category();
		for($i=0; $i<=5; $i++) {
			if (!isset($thisCategory[$i]->category_parent)) break;
			if(isset($thisCategory[$i]->category_parent) && $thisCategory[$i]->category_parent!=0) {
				$catID[] = $thisCategory[$i]->category_parent;
			} else {
				$catID[] = $thisCategory[$i]->term_id;
			}
									
			$cats = get_categories(array('child_of' => $catID[$i], 'hide_empty' => 0));						
									
			foreach ($cats as $cat) {
				$subCats[] = array(
					'url'		=> get_category_link( $cat->cat_ID ),
					'name'		=> $cat->name
				);
			}

			$subCats = array_unique($subCats);
		}
	
	}
	

			
	if(!empty($subCats)) {
		$menu.= '<ul class="secondary-menu">';
		$c=1;
		foreach($subCats as $subCat) {
			$menu.= '<li><a href="'.$subCat['url'].'">'.$subCat['name'].'</a></li>';
			$c++;
			
			if($c>=6) {
				break; 
			}
		}
		$menu.= '</ul>';
	}
	
	echo $menu;
}

/* -------------------------------------------------------------------------*
 * 							COMMENT FORMATION								*
 * -------------------------------------------------------------------------*/
 
 
function orangethemes_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	if(!ot_get_avatar_url(get_avatar( $comment, 60))) {
		$comentClass = "noavatar";
	} else {
		$comentClass = false;	
	}


   ?>
	
	<li <?php comment_class($comentClass); ?> id="li-comment-<?php comment_ID(); ?>">
	
		<div class="commment-content" id="comment-<?php comment_ID() ?>">
			<?php if(ot_get_avatar_url(get_avatar( $comment, 70))) { ?>
				<div class="user-avatar">
					<a href="<?php if(get_comment_author_url()) { echo get_comment_author_url();} else { echo "#"; } ?>" class="hover-effect">
						<img src="<?php echo ot_get_avatar_url(get_avatar( $comment, 73));?>" class="setborder" alt="<?php printf(esc_html__('%1$s','allegro-theme'), get_comment_author());?>" title="<?php printf(esc_html__('%1$s','allegro-theme'), get_comment_author());?>" />
					</a>
				</div>
			<?php } ?>
			<strong class="user-nick">
				<a href="<?php if(get_comment_author_url()) { echo get_comment_author_url();} else { echo "#"; } ?>"><?php printf(esc_html__('%1$s','allegro-theme'), get_comment_author());?></a>
				<?php if($comment->user_id == get_the_author_meta('ID')) { ?>
					<span class="marker"><?php esc_html_e("Author",'allegro-theme');?></span>
				<?php } ?>
			</strong>
		
			<span class="time-stamp"><?php printf(esc_html__(' %1$s, %2$s','allegro-theme'), get_comment_date("F j"), get_comment_time("H:i"));?></span>
			<div class="comment-text">
				<?php comment_text(); ?>
			</div>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => '<span class="icon-text">&#59154;</span><span>'.( esc_html__('Reply to this comment','allegro-theme')).'<span>'))) ?>
		</div>
<?php
       }
	  
if( function_exists("allegro_extended") ) {
	add_action('init', 'add_orangethemes_buttons');	
} 



add_filter('dynamic_sidebar_params','widget_first_last_classes');
add_theme_support('automatic-feed-links' ); 
add_filter('wp', 'OT_setPostViews');


?>