<?
require '../Init.php';

# La url esta vacia.
if ( _empty($G['url']) )
	exit('Debe especificar una dirección web válida.');

# Valor predeterminado para el ancho.
if ( _empty($G['width']) OR !$G['width']->is_numeric() OR $GA['width'] < 1 )
	$G['width'] = 300;

# Valor predeterminado para ser persistente.
if ( $G['persistent'] !== 'true' AND $G['persistent'] !== 'false' )
	$G['persistent'] = 'true';

# Admitir en todos los dominios.
Tpl::AllowCross('*');

# Descargar el Pantallazo.
if ( $G['download'] == 'true' )
{
	# Obtenemos el dominio (Para el nombre del archivo)
	$domain = Core::GetDomain($G['url']);
	# Esta será la ruta donde guardar el archivo temporal.
	$name 	= ROOT . 'temp' . DS . md5($G['url']) . '.png';

	# Creamos el pantallazo y lo guardamos en el archivo temporal.
	Gd::SnapshotWeb($G['url'], $name, $G['width'], $G['persistent']);
	# Se lo damos al usuario.
	Tpl::Download($name, $domain . '.png', 'image/png');
	# Borramos el archivo temporal.
	unlink($name);

	exit;
}

# MOSTRAR PANTALLAZO
Tpl::Image();
echo Gd::SnapshotWeb($G['url']);
