<?
require '../Init.php';
require KERNEL . 'Helpers' . DS . 'External' . DS . 'xml2array.php';

# La url esta vacia.
if ( _empty($G['url']) )
	exit('Debe especificar una dirección web válida.');

# Valor predeterminado de los parametros extra.
if ( $G['attr'] !== '1' AND $G['attr'] !== '0' )
	$G['attr'] = '0';

# Valor predeterminado de las HTML Entities.
if ( $G['entities'] !== 'true' AND $G['entities'] !== 'false' )
	$G['entities'] = 'true';

# Convertimos a entero este valor.
if ( !_empty($G['attr']) )
	$G['attr'] = (integer)$G['attr'];

# Admitir en todos los dominios.
Tpl::AllowCross('*');

# Conectandose con la web y transformando a JSON.
# Lo hacemos con Curl porque algunas páginas detectan el agente (En el caso de Facebook) y nos bloquean el acceso por no tener uno (En caso de usar file_get_contents)
$curl = new Curl($G['url']->urldecode(), array('agent' => 'Chrome'));
$data = $curl->Get();
$json = xml2array($data, $G['attr']);

$data = json_encode($json);

# Queremos descargar el archivo JSON.
if ( $G['download'] == 'true' )
{
	# Obtenemos el dominio (Para el nombre del archivo)
	$domain = Core::GetDomain($G['url']);
	# Esta será la ruta donde guardar el archivo temporal.
	$name 	= ROOT . 'temp' . DS . md5($G['url']) . '.json';

	# Creamos el archivo temporal.
	file_put_contents($name, $data);
	# Se lo damos al usuario.
	Tpl::Download($name, $domain . '.json');
	# Borramos el archivo temporal.
	unlink($name);

	exit;
}

# HTML Entities
if ( $G['entities'] == 'true' )
	$data = htmlentities($data, ENT_NOQUOTES);

echo $data;
