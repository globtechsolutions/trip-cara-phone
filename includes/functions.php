<?php

function strip_zeros_from_date( $marked_string="" ) {
  // first remove the marked zeros
  $no_zeros = str_replace('*0', '', $marked_string);
  // then remove any remaining marks
  $cleaned_string = str_replace('*', '', $no_zeros);
  return $cleaned_string;
}

function redirect_to( $location = NULL ) {
  if ($location != NULL) {
    header("Location: {$location}");
    exit;
  }
}

function output_message($message="") {
  if (!empty($message)) { 
    return "<p class=\"message\">{$message}</p>";
  } else {
    return "";
  }
}


function __autoload($class_name) {
	$class_name = strtolower($class_name);
  $path ="{$class_name}.php";
  if(file_exists($path)) {
    require_once($path);
  } else {
		die("The file {$class_name}.php could not be found.");
	}
}

function log_action($action,$message="") {
	$file = "../../logs/log.txt";
	$new = file_exists('log.txt') ? true : false;
	if($handle = fopen($file, 'a')) {
		$timestamp = strftime("%Y-%m-%d %H:%M:%S" . time());
		$content = "{$timestamp} | {$action} : {$message}\n";
		fwrite($handle, $content);
		fclose($handle);
		if($new) { chmod($file, 0755); }
	} else {
		echo "Could not open file writing";
	}	
}

function datetime_to_text($datetime="") {
  $unixdatetime = strtotime($datetime);
  return strftime("%B %d, %Y at %I:%M %p", $unixdatetime);
}

?>