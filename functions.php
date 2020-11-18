<?php
function console_log_JS($output, $with_script_tags = true) {
  $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';
  if ($with_script_tags) {
      $js_code = '<script>'.$js_code.'</script>';
  }
  echo $js_code;
}

function console_log($output) {
	print_r($output.PHP_EOL);//print a line with end-of-line => carriage return 
  }

function echoAndConsole_log_JS($output){
	echo '<br>'.$output.'<br>' ;
	console_log_JS($output) ;
}

function write_log($log_msg)
{
    $log_fileDir = "logs";
    if (!file_exists($log_fileDir))
    {
        mkdir($log_fileDir, 0777, true);
	}
	$currentDate = date("y-m-d");
	$currentTime = date("H-m-s");
    $log_fileName = $log_fileDir.'/debug-'.$currentDate.'.log';
  file_put_contents($log_fileName, $currentDate.'-'.$currentTime.' : '.$log_msg . "\n", FILE_APPEND);
}
?>