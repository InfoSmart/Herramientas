<?
require '../Init.php';

# La url esta vacia o el nuevo tamaño esta vacio.
if ( _empty($G['url']) OR _empty($G['resize']) )
	exit;

# Transformamos cualquier X a x
$G['resize'] 	= $G['resize']->tolower();
$resize 		= explode('x', $G['resize']);

# Valores invalidos.
if ( !is_numeric($resize[0]) OR !is_numeric($resize[1]) )
	exit;

# Mostramos como imagen.
Tpl::Image();
# Redimensionamos la imagen.
echo Gd::Resize($G['url'], '', $resize[0], $resize[1]);
