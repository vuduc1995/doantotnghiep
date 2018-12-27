<?php

// include('simple_html_dom.php');
// include('db-connection.php');

function scrtdl_getlinkarray(){

	$linkarray = array();

	$html = file_get_html('https://securitydaily.net/category/daily/');

	$post1 = $html->find('.td_module_mx5',0);
	$link1 = $post1->find('a',0)->getAttribute('href');
	array_push($linkarray,$link1);

	$post2345 = $html->find('.td_module_mx6');
	for($i = 0; $i<4;$i++){
		$link = $post2345[$i]->find('a',0)->getAttribute('href');
		array_push($linkarray,$link);
	}

	$posts = $html->find('.td-block-span6');
	foreach ($posts as $post) {
		$link = $post->find('a',0)->getAttribute('href');
		array_push($linkarray,$link);
	}

	// // (For Test) hiển thị kết quả ra trình duyệt
	// foreach($linkarray as $link){
	// 	echo $link;
	// 	echo '<br><br>';
	// }

	return $linkarray;
}

function scrtdl_getcontent($link){

	$html = file_get_html($link);

	$categories = $html->find('.entry-category');
	$tag = "";
	foreach($categories as $category){
		$tag = $tag.','.$category->plaintext;
	}

	$td_post_title = $html->find('.td-post-title',0);
	$title = $td_post_title->find('.entry-title',0)->plaintext;
	$date = $td_post_title->find('.entry-date',0)->getAttribute('datetime');

	$content_string = "";
	$td_content = $html->find('.td-post-content',0);
	foreach($td_content->children() as $child){
		if($child->tag != 'div'){
			if($child->plaintext != null){
				$content_string = $content_string.'<br>'.$child->plaintext;
			}
			$imgs = $child->find('img');
			foreach ($imgs as $img){
				$img_tag = '<img src="'.$img->getAttribute('src').'">';
				$content_string = $content_string.'<br>'.$img_tag;
			}
		}
	}

	$content = array('link'=>$link,'title'=>$title,'tag'=>$tag,'date'=>$date,'author'=>'','content'=>$content_string);

	return $content;
}


function securitydaily(){

	$linkarray = scrtdl_getlinkarray();

	foreach($linkarray as $link){
		//kiem tra xem da co trong csdl chua
		if(is_duplicate_link($link)) continue;

		// lay noi dung bai viet
		$content = scrtdl_getcontent($link);

		// //For test
		// foreach($content as $e){
		// 	echo $e.'<br>';
		// }
		// echo '<br><br><br>';

		// luu vao csdl
		save_to_db($content);
	}
};

?>
