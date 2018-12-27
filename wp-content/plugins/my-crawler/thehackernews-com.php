<?php

// include('simple_html_dom.php');
// include('db-connection.php');

function thkns_getlinkarray(){
	$linkarray = array();

	$html = file_get_html('https://thehackernews.com/');
	$body_posts = $html->find('.body-post');

	foreach ($body_posts as $post){
		$link = $post->find('.story-link',0)->getAttribute('href');
		array_push($linkarray,$link);
	}

	return $linkarray;

}

function thkns_getcontent($link){

	$bo_qua = "(adsbygoogle = window.adsbygoogle || []).push({});";
	$ket_thuc = "Have something to say about this article? Comment below or share it with us on ";

	$html = file_get_html($link);

	$main = $html->find('main',0);
	$title = $main->find('.story-title',0)->plaintext;

	$post_body = $main->find('.post-body',0);
	$date = $post_body->find('*[itemprop="datePublished"]',0)->getAttribute('content');
	$author = $post_body->find('*[rel="author"]',0)->plaintext;

	$content_string = "";
	$content_text = $post_body->find('.articlebody',0)->find('text');
	$content_img = $post_body->find('.articlebody',0)->find('img');

	foreach($content_text as $text){
		if(!strcmp($text,' ')) continue;
		if(!strcmp($text,$bo_qua)) continue;
		if(!strcmp($text,$ket_thuc)) break;
		$content_string = $content_string.'<br>'.$text;
	}
	foreach($content_img as $img){
		$img_tag = '<img src="'.$img->getAttribute('src').'">';
		$content_string = $content_string.'<br>'.$img_tag;
	}

	$content = array('link'=>$link,'title'=>$title,'tag'=>'','date'=>$date,'author'=>$author,'content'=>$content_string);

	return $content;

}

function thehackernews(){

	$linkarray = thkns_getlinkarray();

	foreach($linkarray as $link){
		// kiem tra xem da co trong csdl chua
		if(is_duplicate_link($link)) continue;

		// lay noi dung bai viet
		$content = thkns_getcontent($link);

		// // For test
		// foreach($content as $e){
		// 	echo $e.'<br>';
		// }
		// echo '<br>';

		// luu vao csdl
		save_to_db($content);
	}

}

?>
