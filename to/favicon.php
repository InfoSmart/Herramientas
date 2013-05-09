<?
require '../Init.php';

# La url esta vacia o no es válida.
if ( _empty($G['url']) || !$G['url']->valid(URL) )
	exit('Debe especificar una dirección web válida.');

# Descodificamos.
$G['url'] = $G['url']->urldecode();

# Admitir en todos los dominios.
Tpl::AllowCross('*');

# Obtenemos el Favicon.
$favicon 	= GetFavicon($G['url']);
$data 		= file_get_contents($favicon);

# Fallo. Última esperanza de Google.
if ( empty($data) OR $data == false OR Contains($data, 'Error 503') OR Contains($data, '404 Not Found') )
{
	$favicon 	= 'http://www.google.com/s2/u/0/favicons?domain=' . $G['url'];
	$data 		= file_get_contents($favicon);
}

# Queremos descargar la imagen.
if ( $G['download'] == 'true' AND _empty($G['encode']) )
{
	# Obtenemos el dominio (Para el nombre del archivo)
	$domain = Core::GetDomain($G['url']);
	# Esta será la ruta donde guardar el archivo temporal.
	$name 	= ROOT . 'temp' . DS . md5($G['url']) . '.ico';

	# Creamos el archivo temporal.
	file_put_contents($name, $data);
	# Se lo damos al usuario.
	Tpl::Download($name, $domain . '.ico');
	# Borramos el archivo temporal.
	unlink($name);

	exit;
}

# Codificación en BASE64
if ( $G['encode'] == 'base64' )
	$data = base64_encode($data);

# Codificación en MD5
if ( $G['encode'] == 'md5' )
	$data = md5($data);

# Ninguna codificación, mostrar como Favicon.
if ( _empty($G['encode']) )
	header('Content-type: image/x-icon');

echo $data;
