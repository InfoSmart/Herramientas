<?
// Página en RSS
$url = 'http://www.facebook.com/feeds/page.php?id=198535463518651&format=rss20';
// Codificando
$url = urlencode($url);

// Transformando RSS a JSON
$data = file_get_contents('http://localhost/a/tools/to/xml_json.php?url=' . $url);
// Transformando JSON a Array
$data = json_decode($data, true);
// Ir directamente a las noticias.
$data = $data['rss']['channel'];

// Mostrando los datos obtenidos...
// Esto a nuestro gusto claro.

foreach($data['item'] as $row)
{
	if(empty($row['title']))
		continue;

	echo 'Titulo de la noticia: ' . $row['title'], '<br />';
}
?>