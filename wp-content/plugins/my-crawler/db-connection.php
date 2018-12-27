<?php

// $connection = mysqli_connect("localhost", "root", "", "wordpress");


function is_duplicate_link($link){
	// //For test
	// echo 'Test duplicate link '.$link.'<br>';

	$connection = mysqli_connect("localhost", "root", "", "wordpress");
	$sql = "SELECT * FROM wp_draft WHERE link = '".$link."';";

	// //For test
	// echo $sql.'<br>';

	$result = mysqli_query($connection,$sql);

	if($result->num_rows == 0){
		// //For test
		// echo 'unique<br>';

		return 0;
	}
	else{
		// //For test
		// echo 'duplicated<br><br><br>';

		return 1;
	}

}

function save_to_db($content){
	// //For test
	// echo 'Saving ... <br>';

	$connection = mysqli_connect("localhost", "root", "", "wordpress");
	mysqli_set_charset($connection,"utf8");

	$sql = "INSERT INTO wp_draft (link, title, tag, date, author, content) VALUES
	(
		'".addslashes($content['link'])."',
		'".addslashes($content['title'])."',
		'".addslashes($content['tag'])."',
		'".addslashes($content['date'])."',
		'".addslashes($content['author'])."',
		'".addslashes($content['content'])."'
	);";

	// //For test
	// echo $sql.'<br>';

	$result = mysqli_query($connection,$sql);

	// //For test
	// echo 'Result: '.$result.'<br><br><br>';
}

function old_draft_delete(){
	$connection = mysqli_connect("localhost", "root", "", "wordpress");

	$sql = "SELECT date FROM wp_draft;";
	$result = mysqli_query($connection,$sql);
	$now = date("Y/m/d H:i:s");

	$to_delete = array();

	foreach($result as $r){

		$date = date_create($r['date']);
		date_modify($date,"+30 days");
		$date = date_format($date,"Y/m/d H:i:s");

		if(strtotime($date) < strtotime($now)){
			$sql = "DELETE FROM wp_draft WHERE date='".$r['date']."';";
		}
	}
}


function test_db_select(){
	$connection = mysqli_connect("localhost", "root", "", "wordpress");
	$sql = "SELECT link FROM wp_draft;";
	$result = mysqli_query($connection,$sql);

	echo 'Test db select result: <br>';
	foreach($result as $r){
		echo $r['link'].'<br>';
	}
	echo '<br>';
}

function test_db_insert(){
	$connection = mysqli_connect("localhost", "root", "", "wordpress");
	$sql = "INSERT INTO wp_draft (link, title, date, author, content) VALUES ('link_test','title_test','date_test','author_test','content_test');";

	echo '<br>'.$sql.'<br>';

	$result = mysqli_query($connection,$sql);

	echo 'Test db insert result <br>';
	echo $result;
}

function test_db_delete(){
	$connection = mysqli_connect("localhost", "root", "", "wordpress");
	$sql = "DELETE FROM wp_draft WHERE link = 'link_test';";
	$result = mysqli_query($connection,$sql);

	echo 'Test db delete result <br>';
	echo $result;
}

?>