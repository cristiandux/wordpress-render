<?php
/**
 * The Main Menu
 *
 * @package OlyveTheme
 * @version 1.0.0
 */
if( has_nav_menu( 'primary_menu' ) ) {
	wp_nav_menu( array( 
		'theme_location'  	=> 'primary_menu',
		'container'       	=> '',
		'container_class'	=> '',
		'container_id'   	=> '',
		'menu_class'      	=> 'dtr-nav sf-menu dtr-main-nav',
		'menu_id'         	=> '',
		'depth'           	=> 0,
		) 
	); 
}