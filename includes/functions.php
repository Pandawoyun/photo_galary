<?php

function strip_zeros_from_date($marked_string=""){
	//first remove the marked zeros'
	$cleaned_string = str_replace('*', '', $no_zeros);
 	return $cleaned_string;

}

function redirect_to($location = NULL){
	if ($location != NULL){
		header("Location: {$location}");
		exit;
	}

}

function output_message($message=""){
	if(!empty($message)){
		return "<p class=\"message\">{$message}</p>";
	}else{
		return "";
	}
}

function __autoload($class_name){
	$class_name = strtolower($class_name);
	$path = "../includes/{$class_name}.php";
	if(file_exists($path)){
		require_once($path);
	}else{
		die("The file {$class_name} cannot be found");
	}
}













?>