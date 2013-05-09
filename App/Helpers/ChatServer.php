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
 * @package 	ChatServer
 *
 *
*/

# Acción ilegal.
if ( !defined('BEATROCK') )
	exit;

class ChatServer extends Server
{
	public function CreateClient($socket, $clientId, $server)
	{
		return new ChatClient($socket, $clientId, $server);
	}
}
?>