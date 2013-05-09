<?
// Acción ilegal.
if(!defined('BEATROCK'))
	exit;

//######################################################
//	CONEXIÓN AL SERVIDOR SQL
//######################################################

$config['sql'] = array(

	'type' 		=> 'sqlite',
	'host'		=> '',
	'user'		=> '',
	'pass'		=> '',
	'name'		=> 'C:\Users\Kolesias123\Dropbox\htdocs\a\tools\App\tools.sqlite',
	'prefix'	=> '',
	'port'		=> '3306',

	'repair'		=> false,
	'repair.error'	=> true

);

//######################################################
//	UBICACIÓN DE LA APLICACIÓN
//######################################################

$config['site'] = array(

	'timezone'			=> 'America/Mexico_City',
	'path'				=> 'localhost/a/tools',
	'admin'				=> 'localhost/a/tools/admin',
	'resources'			=> 'localhost/a/tools/resources',
	'resources.global'	=> 'localhost/a/resources/globalv3'

);

//######################################################
//	SEGURIDAD
//######################################################

$config['security'] = array(

	'enabled'	=> false,
	'level'		=> 4,
	'hash'		=> 'gn0&@_y)hpj-ghpd4bl-*/r&/n6&lf7m35f30p3o6l_50r-av9i4r5-(z15vmm-)^sv9p(qu1d--v-)'

);

//######################################################
//	ERRORES	& LOGS
//######################################################

$config['errors'] = array(

	'details'		=> true,
	'hidden'		=> false,
	'email.reports'	=> 'kolesias17@gmail.com'

);

$config['logs'] = array(

	'capture'	=> true,
	'save'		=> 'onerror'

);

//######################################################
//	PARAMETROS EXTRA PARA EL SERVIDOR
//######################################################

$config['server'] = array(

	'gzip'		=> false,
	'host'		=> false,
	'timezone'	=> false,
	'ssl'		=> false,
	'backup'	=> false

);

//######################################################
//	MEMCACHE
//######################################################

$config['memcache'] = array(

	'host'	=> '',
	'port'	=> 11211

);
?>