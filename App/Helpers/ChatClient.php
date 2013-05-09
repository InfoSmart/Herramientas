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
 * @package 	ChatClient
 *
 *
*/

# Acción ilegal.
if ( !defined('BEATROCK') )
	exit;

class ChatClient extends ServerClient
{
	public function Packet($packet)
	{
		parent::Packet($packet);

		//echo $this->hybi10Decode($packet);
	}

	public function PreparePackets()
	{
		echo $this->GetIp();

		$this->OnPacket('enter', function($value)
		{
			$data = array(
				'packet' 	=> 'system_message',
				'value' 	=> Keys('¡Bienvenido a {SITE_NAME}!')
			);

			$this->Send($data, JSON);
		});
	}
}
?>