<?php

/**
* Wordpress favicon helper function
* the_favicon( int $width = '', int $height = '', string|array $attr = '')
*/

function the_favicon($width = '', $height = '', $attr = '') {
  $html = '';
  $image = get_site_icon_url();

  if($image) {

    $hwstring = image_hwstring($width, $height);

    $default_attr = array(
      'src'   => $image,
      'class' => "custom-favicon",
      'alt'   => trim( strip_tags( get_bloginfo('name') ) )
    );

    $attr = wp_parse_args( $attr, $default_attr );
    $attr = apply_filters( 'wp_the_favicon_attributes', $attr );
    $attr = array_map( 'esc_attr', $attr );

    $html = rtrim("<img $hwstring");
    foreach ( $attr as $name => $value ) {
        $html .= " $name=" . '"' . $value . '"';
    }
    $html .= ' />';

  }

  echo $html;

}
