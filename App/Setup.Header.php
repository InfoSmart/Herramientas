<?
/**
 * BeatRock
 *
 * Framework para el desarrollo de aplicaciones web.
 *
 * @author 		Iván Bravo <webmaster@infosmart.mx> @Kolesias123
 * @copyright 	InfoSmart 2013. Todos los derechos reservados.
 * @license 	http://creativecommons.org/licenses/by-sa/2.5/mx/  Creative Commons "Atribución-Licenciamiento Recíproco"
 * @link 		http://beatrock.infosmart.mx/
 * @version 	3.0
 *
*/

# Acción ilegal.
if( !defined('BEATROCK') )
	exit;

## --------------------------------------------------
##        Funciones de cabecera
## --------------------------------------------------
## Utilice este archivo para definir la
## implementación de recursos CSS/JS/Meta en
## su aplicación, utilice la variable $page[id]
## para separar recursos de páginas únicas.
## --------------------------------------------------

#####################################################
## IMPLEMENTACIÓN DE RECURSOS RECOMENDADOS.
#####################################################

# Cargamos Modernizr
Tpl::AddLocalScript('modernizr', true);

# Cargamos main y el Kernel.
Tpl::AddLocalScript('main');
Tpl::AddLocalScript('kernel', true);

# Cargamos el estilo principal.
Tpl::AddLocalStyle('style', true);

# Implementando la etiqueta RSS, solo si lo activamos desde la base de datos.
if( $site['site_rss'] == 'true' )
	Tpl::AddStuff('<link rel="alternate" type="application/rss+xml" title="%site_name%: RSS" href="'. Keys($site['site_rss_path']) .'" />');

#####################################################
## IMPLEMENTACIÓN DE ESTILOS
#####################################################

Tpl::AddLocalStyle('style.page');
Tpl::AddLoadFile(PATH . '/examples/xml2.js');

#####################################################
## INICIALIZACIÓN
#####################################################

# Preparamos todo lo necesario para el SEO
# Incluimos etiquetas recomendadas para:
# Open Graph (Facebook) y Google

if( empty($page['image']) AND defined('LOGO') )
	$page['image'] = LOGO;

if( !empty($page['image']) )
{
	Tpl::AddMeta('og:image', 	$page['image'], 'property');
	Tpl::AddMeta('image', 		$page['image'], 'itemprop');
}

$live = _c(Lang::GetLiveJS());
$live = json_encode($live);

Tpl::AddMeta('name', 		$site['site_name'], 		'itemprop');
Tpl::AddMeta('description', $site['site_description'], 	'itemprop');

#####################################################
## OPEN GRAPH
#####################################################

Tpl::AddMeta('og:title', 		$page['page_name'], 		'property');
Tpl::AddMeta('og:site_name', 	SITE_NAME, 					'property');
Tpl::AddMeta('og:url', 			PATH_NOW, 					'property');
Tpl::AddMeta('og:description', 	$site['site_description'], 	'property');
Tpl::AddMeta('og:type', 		$site['site_type'], 		'property');

if( !empty($site['site_locale']) )
	Tpl::AddMeta('og:locale', 	$site['site_locale'], 		'property');

if( !empty($site['site_og']) )
{
	$og = json_decode(utf8_encode($site['site_og']), true);

	foreach( $og as $param => $value )
		Tpl::AddMeta($param, 	Core::FixText(html_entity_decode($value)), 'property');
}

#####################################################
## OTROS
#####################################################

Tpl::AttrHTML('itemscope');
Tpl::AttrHead('prefix', 'og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#');

# Definir información útil para la cabecera.
Tpl::Set(array(
	'head_attrs_html' 	=> Tpl::$ATTRS_HTML,
	'head_attrs_html' 	=> Tpl::$ATTRS_HEAD,
	'head_metas'		=> Tpl::$METAS,
	'head_stuff'		=> Tpl::$STUFF,
	'head_vars'			=> Tpl::$VARS,
	'head_links'		=> Tpl::$LINKS,
	'head_js'			=> Tpl::$JS,
	'head_lang'			=> $live,
	'head_loadfiles' 	=> json_encode(Tpl::$LOADFILES)
));

$constants = get_defined_constants(true);
$constants = $constants['user'];

# Definir variables de plantilla para las constantes propias. %PATH%, %RESOURCES%, etc..
Tpl::Set($constants);

# Definir variables de configuración de sitio.
Tpl::Set($site);