<?php
/**
 * Created by PhpStorm.
 * User: Gavin
 * Date: 16/8/3
 * Time: 07:28
 */
//$size = getimagesize('https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcSMFynE3clrgzCU2ZDw9SDn5gM2JuwEsCE37Qf4S6uBlJljejEYWg');
//print_r($size);
//var_dump($size);

//echo phpversion();

//exit('hhhh');
//echo gettype('1');

//echo error_reporting(E_ALL^E_ERROR);
//error_reporting(0);
//if (!$tmp_i) {
//    $tmp_i=10;
//}
//
//echo $tmp_i;

$url = 'http://username:password@hostname/path?arg=value#anchor';
$arr = parse_url($url);

echo pathinfo($arr['path']);
//print_r($arr['path']);
