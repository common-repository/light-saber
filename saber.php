<?php
/**
 * @package Light_Saber
 * @version 1.0
 */
/*
Plugin Name: Light Saber
Plugin URI: http://webdeveloper2.com/
Description: This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation. Do. Or do not. There is no try.
Author: Webdeveloper2
Version: 1.0
Author URI: http://webdeveloper2.com/
*/

function light_saber_get_quote() {
	/** These are the quotes */
	$quotes = "I have a bad feeling about this
May The Force be with you
It's not my fault
Your focus determines your reality
Do. Or do not. There is no try
Somebody has to save our skins
In my experience there is no such thing as luck
I find your lack of faith disturbing
It's a trap!
Your eyes can deceive you. Don’t trust them
Never tell me the odds
He's using an old Jedi mind trick
Great, kid. Don't get cocky
Stay on target
What a piece of junk!
Watch your mouth kid, or you'll find yourself floating home
Evacuate in our moment of triumph?
If this is a consular ship, where is the ambassador?
Aren't you a little short for a stormtrooper?
That's no moon, it’s a space station
You just watch yourself. We're wanted men
Into the garbage chute, flyboy!
The Force is strong with this one
I suggest a new strategy. Let the wookiee win
You've never heard of the Millennium Falcon?
Use the Force
You're my only hope
You will never find a more wretched hive of scum and villainy";

	// Here we split it into lines
	$quotes = explode( "\n", $quotes );

	// And then randomly choose a line
	return wptexturize( $quotes[ mt_rand( 0, count( $quotes ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function light_saber() {
	$chosen = light_saber_get_quote();
	echo "<p id='saber'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'light_saber' );

// We need some CSS to position the paragraph
function saber_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#saber {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'saber_css' );

?>
