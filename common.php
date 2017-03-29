<?php

header('content-type:text/jsonp;charset=utf-8');
 $kw = $_REQUEST['kw'];
 $index =$_REQUEST['index'];
 $url = 'http://v5.pc.duomi.com/search-ajaxsearch-searchall?kw='.$kw.'&pi='.$index.'&pz=10';
 $data = [];
function getData($url,$data){
  $ch = curl_init();
  $timeout = 60; 
  curl_setopt ($ch, CURLOPT_URL, $url); 
  curl_setopt($ch, CURLOPT_POST, true); 
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
  curl_setopt($ch,CURLOPT_HEADER,0);  
  curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
  curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout); 
  $file_contents = curl_exec($ch); 
  if ($file_contents===false) {
     echo 'Curl error: ' . curl_error($ch) . "<br>\n\r";
     exit();
  }
  curl_close($ch); 
  return $file_contents; 
}

$result=getData($url,$data);
echo $result;

?>