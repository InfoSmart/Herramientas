/**
 * JavaScript - Página principal.
 * ???. Todos los derechos reservados.
 *
 * Copyright 2013 - ??? and jQuery Technology.
 * http://www. - http://www.jquery.com/ -
**/

/*
	Sistema de cambio de idioma en tiempo real.
*/

$('body').on('click', '[data-lng]', function()
{
	// Idioma seleccionado. (es, en, pt)
	Value = $(this).data('lng');

	// Agregar o cambiar ?lang= a la url.
	Kernel.AddParam('lang', Value);

	/*
		Cambiar el idioma de la página.
		El módulo "Language" se encuentra en /resources/system/js/functions.kernel.js
	*/
	Language.Change(Value);
});