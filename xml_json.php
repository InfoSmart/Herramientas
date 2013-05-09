<?
require 'Init.php';
require KERNEL . 'Helpers' . DS . 'External' . DS . 'geshi' . DS . 'geshi.php';

$data 	= file_get_contents('./examples/xml1.txt');
$data 	= Keys($data);
$geshi 	= new GeSHi($data, 'php');

$data 	= file_get_contents('./examples/xml2.txt');
$data 	= Keys($data);
$geshi2 = new GeSHi($data, 'javascript');

$page['id'] 	= 'xml_json';
$page['name'] 	= 'Transformando XML a JSON.';