<?php
    include ('../settings.php');
	include ('../queries/post.qry');
    $a_subject=$_POST['a_subject'];
    $a_content=$_POST['a_content'];
    $a_author=$_POST['a_author'];
    $date_posted=$_POST['date_posted'];
	

	$announce = new Post;
	$make_announce = $announce->insert_post(
	$pdo,
	$date_posted,
	$a_author,
	$a_subject,
	$a_content
	);
	
	
?>