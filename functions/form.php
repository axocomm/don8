<?php
// PayPal Button
// Code from here https://www.paypal.com/uk/cgi-bin/webscr?cmd=_pdn_donate_techview_outside
class don8 {

	public function __construct() {
		add_shortcode( 'don8', array( $this, 'don8' ) );
		add_shortcode( 'don8_button', array( $this, 'button' ) );
		add_shortcode( 'don8_form', array( $this, 'form' ) );
	}

	public function don8( $atts, $content = null ) {
		// Get values from Don8 options
		$don8_email    = get_option( 'don8_paypal_email' );
		$don8_cause    = esc_attr( get_option( 'don8_cause' ) );
		$don8_currency = esc_attr( get_option( 'don8_currency' ) );
		$don8_value    = esc_attr( get_option( 'don8_value' ) );
// Set Don8 options and defaults for parameters
		extract( shortcode_atts( array(
			'cause'    => $don8_cause,
			'email'    => $don8_email,
			'currency' => $don8_currency,
			'value'    => $don8_value,
		), $atts ) );
		if ( empty( $currency ) ) {
			$currency = 'USD';
		}

		$don8_button = '<form name="_xclick" action="https://www.paypal.com/uk/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="' . esc_html( $email ) . '">
<input type="hidden" name="item_name" value="' . esc_html( $cause ) . '">
<input type="hidden" name="currency_code" value="' . esc_html( $currency ) . '">
<input type="hidden" name="amount" value="' . esc_html( $value ) . '">
<input type="image" src="http://www.paypal.com/en_GB/i/btn/x-click-butcc-donate.gif" border="0" name="submit" alt="Donate to ' . esc_html( $cause ) . '">
</form>';

		return $don8_button;
	}

	public function button( $atts, $content = null ) {

	}

	public function form( $atts, $content = null ) {

	}

}

new don8();
/**
 * [don8]
 * [don8_button]
 * [don8_form]
 */
// Get values from Don8 options
$don8_email = get_option( 'don8_paypal_email' );
$don8_cause = esc_attr( get_option( 'don8_cause' ) );
$don8_value = esc_attr( get_option( 'don8_value' ) );
// Set Don8 options and defaults for parameters
extract( shortcode_atts( array(
	'cause' => $don8_cause,
	'email' => $don8_email,
	'value' => $don8_value,
), $atts ) );

$don8_button = '<form name="_xclick" action="https://www.paypal.com/uk/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="' . $email . '">
<input type="hidden" name="item_name" value="' . $cause . '">
<input type="hidden" name="currency_code" value="GBP">
<input type="hidden" name="amount" value="' . $value . '">
<input type="image" src="http://www.paypal.com/en_GB/i/btn/x-click-butcc-donate.gif" border="0" name="submit" alt="Donate to ' . $cause . '">
</form>';

return $don8_button;