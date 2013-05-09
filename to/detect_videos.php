<?php
require '../Init.php';

if(empty($G['url']) OR empty($G['format']))
	exit;


Curl::Init($G['url']);
$html = Curl::Get();

preg_match_all("/http:\/\/(.*?)(.flv|.avi|.mpeg|.wmv|.mp4)/i", $html, $videos);

_r($videos);



/*
if(!empty($G['url']))
{
	Curl::Init($G['url']);
	$html = Curl::Get();

	preg_match_all("/http:\/\/(.*?).flv/i", $html, $videos);

	foreach($videos[0] as $vid)
	{
	?>
	<video controls>
		<source src="<?=$vid?>" />
	</video>

	<p>
		<a href="<?=$vid?>"><?=$vid?></a>
	</p>
	<?
	}

	//echo _c($html);
}
*/
?>