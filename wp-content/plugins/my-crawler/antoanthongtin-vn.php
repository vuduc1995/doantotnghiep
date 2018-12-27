<?php
// include('simple_html_dom.php');

function attt_getlinkarray(){
	$linkarray = array();

	$html = file_get_html('http://antoanthongtin.vn/List.aspx?MenuID=dd03bec9-f8bc-4092-95e4-5951a9723142&CatID=dd03bec9-f8bc-4092-95e4-5951a9723142');

	$post1 = $html->find('#list_first',0);
	$link1 = 'antoanthongtin.vn'.$post1->find('a',0)->getAttribute('href');
	array_push($linkarray,$link1);

	$posts = $html->find('#list_posts',0)->find('.li');
	foreach ($posts as $post){
		$link = 'antoanthongtin.vn'.$post->find('h4',0)->find('a',0)->getAttribute('href');
		array_push($linkarray,$link);
	}
	return $linkarray;
}

function attt_getcontent($link){

	$html = file_get_html($link);

	$temp = $html->find('#postDate',0)->find('.floatL',0)->plaintext;
	$date = substr($temp,34,19);

	$title = $html->find('.content',0)->find('h1',0)->plaintext;

	$author = $html->find('.content',0)->last_child()->plaintext;

	$content_string = "";
	$summary = $html->find('.summary',0)->plaintext;
	$content_string = $content_string.'<br>'.$summary;
	foreach($html->find('.content',0)->find('div',0)->children() as $child){
		$text = $child->plaintext;
		if($text != ''){
			$content_string = $content_string.'<br>'.$text;
		}
		$imgs = $child->find('img');
		foreach($imgs as $img){
			$img_tag = '<img src="http://antoanthongtin.vn'.$img->getAttribute('src').'">';
			$content_string = $content_string.'<br>'.$img_tag;
		}
	}

	$content = array('link'=>$link,'title'=>$title,'tag'=>'','date'=>$date,'author'=>$author,'content'=>$content_string);

	return $content;


}

function antoanthongtin(){

	$linkarray = attt_getlinkarray();

	foreach($linkarray as $link){
		//kiem tra xem da co trong csdl chua
		if(is_duplicate_link($link)) continue;

		// lay noi dung bai viet
		$content = attt_getcontent($link);

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