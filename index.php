<?php
	header("Access-Control-Allow-Origin: *");
	header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
    header('Access-Control-Allow-Headers: x-requested-with');

	$host = 'http://proxying_url';

	$post = $_POST;
	$path = $_SERVER['PATH_INFO'];
	$get = $_GET;

	$ch = curl_init('http://'.$host.$path.(count($get)>0?'?'.http_build_query($get):''));
	if(count($post)>0){
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
	}
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	$result = curl_exec($ch);

	echo $result;