<?php
/**
 * Customize the output of menus for Foundation top bar
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

 // Big thanks to Brett Mason (https://github.com/brettsmason) for the awesome walker

 if ( ! class_exists( 'Foundationpress_Top_Bar_Walker' ) ) :
 class Foundationpress_Top_Bar_Walker extends Walker_Nav_Menu {

 	function start_lvl( &$output, $depth = 0, $args = array() ) {
 			$indent = str_repeat("\t", $depth);
      $output .= "\n$indent<ul class=\"submenu\" data-toggle>\n";
 	}
 }


 if ( ! class_exists( 'Foundationpress_Mobile_Walker' ) ) :
 class Foundationpress_Mobile_Walker extends Walker_Nav_Menu {
 	function start_lvl( &$output, $depth = 0, $args = array() ) {
 			$indent = str_repeat("\t", $depth);
 			$output .= "\n$indent<ul class=\"vertical nested menu\">\n";
 	}
 }
 endif;

endif;


class Custom_Header_Nav_Walker extends Walker_Nav_Menu {
  function start_lvl(&$output, $depth) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"submenu\">\n";
  }
}

