<?php
/**
 * Example
 */

require_once( 'functions.php' );

// if form not submitted, show it and bail
if ( ! isset( $_GET['top_text'] ) && ! isset( $_GET['bottom_text'] ) ) {
	?>
	<form>
	<p>Top text:<br /><input name="top_text" /></p>
	<p>Bottom text:<br /><input name="bottom_text" /></p>
	<p><input type="submit" /></p>
	</form>
	<img src="toystory.jpg" />
	<?php
	die();
}

// get form submission (or defaults)
$top_text    = isset( $_GET['top_text'] )    ? $_GET['top_text']    : 'Cat hair';
$bottom_text = isset( $_GET['bottom_text'] ) ? $_GET['bottom_text'] : 'Cat hair everywhere';
$filename    = memegen_sanitize( $bottom_text ? $bottom_text : $top_text );

// setup args for image
$args = array(
	'top_text'    => $top_text,
	'bottom_text' => $bottom_text,
	'filename'    => $filename,
	'font'        => dirname(__FILE__) .'/Anton.ttf',
	'memebase'    => dirname(__FILE__) .'/toystory.jpg',
	'textsize'    => 40,
	'textfit'     => true,
	'padding'     => 10,
);

// create and output image
memegen_build_image( $args );
