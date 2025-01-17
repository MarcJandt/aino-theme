<?php
/**
 * Aino: Custom CSS for the editor.
 *
 * @package Aino
 */

/**
 * Add customizer colors to the block editor.
 */
function aino_editor_customizer_generated_values() {

	// Retrieve colors from the Customizer.
	
	$primary_one_color = get_theme_mod( 'primary_one_color', aino_defaults( 'primary_one_color' ) );
	$btn_text_color    = get_theme_mod( 'btn_text_color', aino_defaults( 'btn_text_color' ) );
	$main_bg_color = get_theme_mod( 'main_bg_color', aino_defaults( 'main_bg_color' ) );


	// Build styles.
	$editor_css = '
	.editor-styles-wrapper {
		background-color: ' . esc_attr( $main_bg_color ) . ';
	}
	.editor-styles-wrapper p a:hover,
	.editor-styles-wrapper h1 a:hover,
	.editor-styles-wrapper h2 a:hover,
	.editor-styles-wrapper h3 a:hover,
	.editor-styles-wrapper h4 a:hover,
	.editor-styles-wrapper h5 a:hover,
	.editor-styles-wrapper h6 a:hover,
	.editor-styles-wrapper blockquote:not(.has-text-color) .wp-block-pullquote__citation a:hover,
	.wp-block-pullquote__citation a:hover {
		color: ' . esc_attr( $primary_one_color ) . ';
		fill: ' . esc_attr( $primary_one_color ) . ';
	}

	.theme-dark-mode .editor-styles-wrapper {
		background-color: #000000;
	}

	.theme-dark-mode .editor-styles-wrapper,
	.theme-dark-mode .editor-styles-wrapper .editor-post-title__input,
	.theme-dark-mode .editor-styles-wrapper h1,
	.theme-dark-mode .editor-styles-wrapper h2,
	.theme-dark-mode .editor-styles-wrapper h3,
	.theme-dark-mode .editor-styles-wrapper h4,
	.theme-dark-mode .editor-styles-wrapper h5,
	.theme-dark-mode .editor-styles-wrapper h6,
	.theme-dark-mode .editor-styles-wrapper p,
	.theme-dark-mode .editor-styles-wrapper h1 a,
	.theme-dark-mode .editor-styles-wrapper h2 a,
	.theme-dark-mode .editor-styles-wrapper h3 a,
	.theme-dark-mode .editor-styles-wrapper h4 a,
	.theme-dark-mode .editor-styles-wrapper h5 a,
	.theme-dark-mode .editor-styles-wrapper h6 a,
	.theme-dark-mode .editor-styles-wrapper p a {
		color: #ffffff;
	}

	.block-editor__container .editor-styles-wrapper .wp-block-button .wp-block-button__link {
		background-color: ' . esc_attr( $primary_one_color ) . ';
		color: ' . esc_attr( $btn_text_color ) . ';
	}

	.block-editor__container .editor-styles-wrapper .wp-block-button:not(.has-text-color):not(.is-style-outline) [data-rich-text-placeholder]:after {
		color: ' . esc_attr( $btn_text_color ) . ';
	}

	';

	return wp_strip_all_tags( apply_filters( 'aino_editor_customizer_generated_values', $editor_css ) );
}

/**
 * Enqueue Customizer settings into the block editor.
 */
function aino_editor_customizer_styles() {

	// Register Customizer styles within the editor to use for inline additions.
	wp_register_style( 'aino-editor-customizer-styles', false, '0.0.1', 'all' );

	// Enqueue the Customizer style.
	wp_enqueue_style( 'aino-editor-customizer-styles' );

	// Add custom colors to the editor.
	wp_add_inline_style( 'aino-editor-customizer-styles', aino_editor_customizer_generated_values() );
}
add_action( 'enqueue_block_editor_assets', 'aino_editor_customizer_styles' );
