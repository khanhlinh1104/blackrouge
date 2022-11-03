<?php


$cosmetic_store_custom_css = '';

/*---------------------------text-transform-------------------*/

$cosmetic_store_text_transform = get_theme_mod( 'menu_text_transform_cosmetic_store','CAPITALISE');
if($cosmetic_store_text_transform == 'CAPITALISE'){

	$cosmetic_store_custom_css .='#main-menu ul li a{';

		$cosmetic_store_custom_css .='text-transform: capitalize ; font-size: 13px !important;';

	$cosmetic_store_custom_css .='}';

}else if($cosmetic_store_text_transform == 'UPPERCASE'){

	$cosmetic_store_custom_css .='#main-menu ul li a{';

		$cosmetic_store_custom_css .='text-transform: uppercase ; font-size: 13px !important';

	$cosmetic_store_custom_css .='}';

}else if($cosmetic_store_text_transform == 'LOWERCASE'){

	$cosmetic_store_custom_css .='#main-menu ul li a{';

		$cosmetic_store_custom_css .='text-transform: lowercase ; font-size: 13px !important';

	$cosmetic_store_custom_css .='}';
}

/*---------------------------Container Width-------------------*/

$cosmetic_store_container_width = get_theme_mod('cosmetic_store_container_width');
	$cosmetic_store_custom_css .='body{';
		$cosmetic_store_custom_css .='width: '.esc_attr($cosmetic_store_container_width).'%; margin: auto';
	$cosmetic_store_custom_css .='}';