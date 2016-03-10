<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 */
function optionsframework_option_name() {
	// Change this to use your theme slug
	return 'options-framework-theme';
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'theme-textdomain'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Test data
	$test_array = array(
		'one' => __( 'One', 'theme-textdomain' ),
		'two' => __( 'Two', 'theme-textdomain' ),
		'three' => __( 'Three', 'theme-textdomain' ),
		'four' => __( 'Four', 'theme-textdomain' ),
		'five' => __( 'Five', 'theme-textdomain' )
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __( 'French Toast', 'theme-textdomain' ),
		'two' => __( 'Pancake', 'theme-textdomain' ),
		'three' => __( 'Omelette', 'theme-textdomain' ),
		'four' => __( 'Crepe', 'theme-textdomain' ),
		'five' => __( 'Waffle', 'theme-textdomain' )
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );

	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages( 'sort_column=post_parent,menu_order' );
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();

	$options[] = array(
		'name' => __( 'HEADER', 'theme-textdomain' ),
		'type' => 'heading'
	);

	$options[] = array(
		'name' => __( 'Boton ver fechas del tour', 'theme-textdomain' ),
		'desc' => __( '', 'theme-textdomain' ),
		'id' => 'header_boton',
		'std' => 'VER FECHAS DEL TOUR',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Boton separa tu cupo', 'theme-textdomain' ),
		'desc' => __( '', 'theme-textdomain' ),
		'id' => 'header_boton_separa_cupo',
		'std' => 'Separa tu cupo',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Header Teléfono', 'theme-textdomain' ),
		'desc' => __( '', 'theme-textdomain' ),
		'id' => 'header_telefono',
		'std' => '+ 1 (786) 805-0449',
		'type' => 'text'
	);

	// Texto Call to Action
	$options[] = array(
		'name' => __( 'CALL TO ACTION', 'theme-textdomain' ),
		'type' => 'heading'
	);

	$options[] = array(
		'name' => __( 'Texto Call to action', 'theme-textdomain' ),
		'desc' => __( '', 'theme-textdomain' ),
		'id' => 'text_call_to_action',
		'std' => '<p>Aprenderás cómo <span>de-codificar</span> y <span>codificar científicamente</span> discursos comerciales, ventas; y lo más importante <span>tu mente</span>.</p>',
		'type' => 'textarea'
	);

	$options[] = array(
		'name' => __( 'VIDEO Y FORMULARIO', 'theme-textdomain' ),
		'type' => 'heading'
	);

	$options[] = array(
		'name' => __( 'ID video', 'theme-textdomain' ),
		'desc' => __( '', 'theme-textdomain' ),
		'id' => 'id_video',
		'std' => 'E2FViQeollU',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Email recepcion', 'theme-textdomain' ),
		'desc' => __( '', 'theme-textdomain' ),
		'id' => 'email_recepcion',
		'std' => 'smjurgenklaric@gmail.com',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'AGENDA ACADEMICA', 'theme-textdomain' ),
		'type' => 'heading'
	);

	$options[] = array(
		'name' => __( 'Texto agenda academica', 'theme-textdomain' ),
		'desc' => __( '', 'theme-textdomain' ),
		'id' => 'text_agenda',
		'std' => '<p>Tu participación en este programa certificado tiene un alto valor curricular, serás acreditado con un título otorgado por BiiA Lab USA una de las instituciones más auténticas y vanguardistas de los Estados Unidos; al cursar y completar correctamente tu examen el cual deberás tomarlo en línea en <a target="new" href="http://www.biialab.org/"><strong>www.BiiALab.org</strong></a> en un tiempo máximo de 10 días, después de terminar el programa recibirás el mismo vía digital.</p>',
		'type' => 'textarea'
	);

	$options[] = array(
		'name' => __( 'Imagen agenda academica', 'theme-textdomain' ),
		'desc' => __( '', 'theme-textdomain' ),
		'id' => 'img_agenda',
		'std' => '',
		'type' => 'upload'
	);

	$options[] = array(
		'name' => __( 'FECHAS', 'theme-textdomain' ),
		'type' => 'heading'
	);

	$options[] = array(
		'name' => __( 'Ciudad 1', 'theme-textdomain' ),
		'desc' => __( '', 'theme-textdomain' ),
		'id' => 'ciudad_1',
		'std' => 'Medellín, Colombia',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( 'Fecha 1', 'theme-textdomain' ),
		'desc' => __( '', 'theme-textdomain' ),
		'id' => 'fecha_1',
		'std' => '17 de Marzo de 2016',
		'type' => 'text'
	);

	//Ciudad 2
	$options[] = array(
		'name' => __( 'Ciudad 2', 'theme-textdomain' ),
		'desc' => __( '', 'theme-textdomain' ),
		'id' => 'ciudad_2',
		'std' => 'Arequipa, Perú',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( 'Fecha 2', 'theme-textdomain' ),
		'desc' => __( '', 'theme-textdomain' ),
		'id' => 'fecha_2',
		'std' => '22 de Abril de 2016',
		'type' => 'text'
	);

	//Ciudad 3
	$options[] = array(
		'name' => __( 'Ciudad 3', 'theme-textdomain' ),
		'desc' => __( '', 'theme-textdomain' ),
		'id' => 'ciudad_3',
		'std' => 'Monterrey, México',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( 'Fecha 3', 'theme-textdomain' ),
		'desc' => __( '', 'theme-textdomain' ),
		'id' => 'fecha_3',
		'std' => '25 de Abril de 2016',
		'type' => 'text'
	);

	//Ciudad 4
	$options[] = array(
		'name' => __( 'Ciudad 4', 'theme-textdomain' ),
		'desc' => __( '', 'theme-textdomain' ),
		'id' => 'ciudad_4',
		'std' => 'Santiago, Chile',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( 'Fecha 4', 'theme-textdomain' ),
		'desc' => __( '', 'theme-textdomain' ),
		'id' => 'fecha_4',
		'std' => '6 de Mayo de 2016',
		'type' => 'text'
	);

	//Ciudad 5
	$options[] = array(
		'name' => __( 'Ciudad 5', 'theme-textdomain' ),
		'desc' => __( '', 'theme-textdomain' ),
		'id' => 'ciudad_5',
		'std' => 'Buenos Aires, Argentina',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( 'Fecha 5', 'theme-textdomain' ),
		'desc' => __( '', 'theme-textdomain' ),
		'id' => 'fecha_5',
		'std' => '10 de Mayo de 2016',
		'type' => 'text'
	);

	//Ciudad 6
	$options[] = array(
		'name' => __( 'Ciudad 6', 'theme-textdomain' ),
		'desc' => __( '', 'theme-textdomain' ),
		'id' => 'ciudad_6',
		'std' => 'Montevideo, Uruguay',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( 'Fecha 6', 'theme-textdomain' ),
		'desc' => __( '', 'theme-textdomain' ),
		'id' => 'fecha_6',
		'std' => '12 de Mayo de 2016',
		'type' => 'text'
	);

	//Ciudad 7
	$options[] = array(
		'name' => __( 'Ciudad 7', 'theme-textdomain' ),
		'desc' => __( '', 'theme-textdomain' ),
		'id' => 'ciudad_7',
		'std' => 'Cancún, México',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( 'Fecha 7', 'theme-textdomain' ),
		'desc' => __( '', 'theme-textdomain' ),
		'id' => 'fecha_7',
		'std' => '16 de Junio de 2016',
		'type' => 'text'
	);

	//Ciudad 8
	$options[] = array(
		'name' => __( 'Ciudad 8', 'theme-textdomain' ),
		'desc' => __( '', 'theme-textdomain' ),
		'id' => 'ciudad_8',
		'std' => 'Queretaro, México',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( 'Fecha 8', 'theme-textdomain' ),
		'desc' => __( '', 'theme-textdomain' ),
		'id' => 'fecha_8',
		'std' => '21 de Junio de 2016',
		'type' => 'text'
	);

	//Ciudad 9
	$options[] = array(
		'name' => __( 'Ciudad 9', 'theme-textdomain' ),
		'desc' => __( '', 'theme-textdomain' ),
		'id' => 'ciudad_9',
		'std' => 'León, México',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( 'Fecha 9', 'theme-textdomain' ),
		'desc' => __( '', 'theme-textdomain' ),
		'id' => 'fecha_9',
		'std' => '22 de Junio de 2016',
		'type' => 'text'
	);

	//Ciudad 10
	$options[] = array(
		'name' => __( 'Ciudad 10', 'theme-textdomain' ),
		'desc' => __( '', 'theme-textdomain' ),
		'id' => 'ciudad_10',
		'std' => 'Guadalajara, México',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( 'Fecha 10', 'theme-textdomain' ),
		'desc' => __( '', 'theme-textdomain' ),
		'id' => 'fecha_10',
		'std' => '27 de Junio de 2016',
		'type' => 'text'
	);

	//Ciudad 11
	$options[] = array(
		'name' => __( 'Ciudad 11', 'theme-textdomain' ),
		'desc' => __( '', 'theme-textdomain' ),
		'id' => 'ciudad_11',
		'std' => 'Tijuana, México',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( 'Fecha 11', 'theme-textdomain' ),
		'desc' => __( '', 'theme-textdomain' ),
		'id' => 'fecha_11',
		'std' => '1 de Julio de 2016',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Texto boton Quiero asistir', 'theme-textdomain' ),
		'desc' => __( '', 'theme-textdomain' ),
		'id' => 'quiero_asistir',
		'std' => 'Quiero asistir',
		'type' => 'text'
	);




	return $options;
}