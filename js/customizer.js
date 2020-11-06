jQuery( document ).ready(function($) {
	"use strict";

	/**
	 * WP ColorPicker Alpha Color Picker Control
	 *
	 * @author Anthony Hortin <http://maddisondesigns.com>
	 * @license http://www.gnu.org/licenses/gpl-2.0.html
	 * @link https://github.com/maddisondesigns
	 */

	// Manually initialise the wpColorPicker controls so we can add the color picker palette
	$('.wpcolorpicker-alpha-color-picker').each(function( i, obj ) {
		var paletteColors = _wpCustomizeSettings.controls[$(this).attr('id')].colorpickerpalette;
		var options = {
			palettes: paletteColors
		};
		$(obj).wpColorPicker(options);
	} );

});
