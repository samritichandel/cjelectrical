<?php

//custom scripts for the theme
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
wp_enqueue_style( 'font-google', 'https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i' );
wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/css/font-awesome.min.css' );
wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css' );
wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/css/style.css' );

//js files
wp_enqueue_script( 'bootstarpjs', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array(), '1.0.0', true );
wp_enqueue_script( 'mainjs', get_stylesheet_directory_uri() . '/js/main.js', array(), '1.0.0', true );
wp_enqueue_script( 'custom', get_stylesheet_directory_uri() . '/js/custom.js', array(), '1.0.0', true );
}



//custom settings for header and footer text area

add_action( 'admin_menu', 'Cj_add_admin_menu' );
add_action( 'admin_init', 'Cj_settings_init' );


function Cj_add_admin_menu(  ) { 

	add_options_page( 'CJ Electrical', 'CJ Electrical', 'manage_options', 'cj_electrical', 'Cj_options_page' );

}


function Cj_settings_init() { 

	register_setting( 'pluginPage', 'Cj_settings' );

	add_settings_section(
		'Cj_pluginPage_section', 
		__( 'Header Footer Fields Settings', 'cjelectrical' ), 
		'Cj_settings_section_callback', 
		'pluginPage'
	);

	add_settings_field( 
		'Cj_text_field_0', 
		__( 'Header Title', 'cjelectrical' ), 
		'Cj_text_field_0_render', 
		'pluginPage', 
		'Cj_pluginPage_section' 
	);

	add_settings_field( 
		'Cj_text_field_1', 
		__( 'Header Subtitle', 'cjelectrical' ), 
		'Cj_text_field_1_render', 
		'pluginPage', 
		'Cj_pluginPage_section' 
	);

	add_settings_field( 
		'Cj_text_field_2', 
		__( 'Phone Number text', 'cjelectrical' ), 
		'Cj_text_field_2_render', 
		'pluginPage', 
		'Cj_pluginPage_section' 
	);

	add_settings_field( 
		'Cj_text_field_3', 
		__( 'Phone Number', 'cjelectrical' ), 
		'Cj_text_field_3_render', 
		'pluginPage', 
		'Cj_pluginPage_section' 
	);

	add_settings_field( 
		'Cj_text_field_4', 
		__( 'Footer Copyright Text', 'cjelectrical' ), 
		'Cj_text_field_4_render', 
		'pluginPage', 
		'Cj_pluginPage_section' 
	);

	add_settings_field( 
		'Cj_text_field_5', 
		__( 'Email', 'cjelectrical' ), 
		'Cj_text_field_5_render', 
		'pluginPage', 
		'Cj_pluginPage_section' 
	);

	add_settings_field( 
		'Cj_text_field_6', 
		__( 'Link for Google Plus', 'cjelectrical' ), 
		'Cj_text_field_6_render', 
		'pluginPage', 
		'Cj_pluginPage_section' 
	);

	add_settings_field( 
		'Cj_text_field_7', 
		__( 'Link for Facebok', 'cjelectrical' ), 
		'Cj_text_field_7_render', 
		'pluginPage', 
		'Cj_pluginPage_section' 
	);


}


function Cj_text_field_0_render(  ) { 

	$options = get_option( 'Cj_settings' );
	?>
	<input type='text' name='Cj_settings[Cj_text_field_0]' value='<?php echo $options['Cj_text_field_0']; ?>'>
	<?php

}


function Cj_text_field_1_render(  ) { 

	$options = get_option( 'Cj_settings' );
	?>
	<input type='text' name='Cj_settings[Cj_text_field_1]' value='<?php echo $options['Cj_text_field_1']; ?>'>
	<?php

}


function Cj_text_field_2_render(  ) { 

	$options = get_option( 'Cj_settings' );
	?>
	<input type='text' name='Cj_settings[Cj_text_field_2]' value='<?php echo $options['Cj_text_field_2']; ?>'>
	<?php

}


function Cj_text_field_3_render(  ) { 

	$options = get_option( 'Cj_settings' );
	?>
	<input type='text' name='Cj_settings[Cj_text_field_3]' value='<?php echo $options['Cj_text_field_3']; ?>'>
	<?php

}

function Cj_text_field_4_render(  ) { 

	$options = get_option( 'Cj_settings' );
	?>
	<input type='text' name='Cj_settings[Cj_text_field_4]' value='<?php echo $options['Cj_text_field_4']; ?>'>
	<?php

}

function Cj_text_field_5_render(  ) { 

	$options = get_option( 'Cj_settings' );
	?>
	<input type='text' name='Cj_settings[Cj_text_field_5]' value='<?php echo $options['Cj_text_field_5']; ?>'>
	<?php

}

function Cj_text_field_6_render(  ) { 

	$options = get_option( 'Cj_settings' );
	?>
	<input type='text' name='Cj_settings[Cj_text_field_6]' value='<?php echo $options['Cj_text_field_6']; ?>'>
	<?php

}

function Cj_text_field_7_render(  ) { 
	$options = get_option( 'Cj_settings' );
	?>
	<input type='text' name='Cj_settings[Cj_text_field_7]' value='<?php echo $options['Cj_text_field_7']; ?>'>
	<?php
}

function Cj_settings_section_callback(  ) { 
	echo __( 'You can manage the text for header and footer fields from here', 'cjelectrical' );
}
function Cj_options_page(  ) { 
	?>
	<form action='options.php' method='post'>
		<h2>CJ Electrical Fields Settings</h2>
		<?php
		settings_fields( 'pluginPage' );
		do_settings_sections( 'pluginPage' );
		submit_button();
		?>
	</form>
	<?php
}
//adding custom post type for testimonials
add_action( 'init', 'testimonials' );
function testimonials() {
	register_post_type( 'testimonials',
    array(
      'labels' => array(
        'name' => __( "Testimonials" ),
        'singular_name' => __( "testimonials" ),
        'all_items'=> __("All testimonials"),
        'edit_item' => __("Edit testimonials"),
         'add_new' => __("Add new")
      ),
        'rewrite' => array( 'slug' => 'testimonials','with_front' => true),
	  'capability_type' =>  'post',
          'public' => true,
          'hierarchical' => true,
	  'supports' => array(
	  'title',
	  'editor',
	  )
    )
  );       
}

//custom post types for services
add_action( 'init', 'services' );
function services() {
	register_post_type( 'services',
    array(
      'labels' => array(
        'name' => __( "Services" ),
        'singular_name' => __( "services" ),
        'all_items'=> __("All services"),
        'edit_item' => __("Edit"),
         'add_new' => __("Add new")
      ),
        'rewrite' => array( 'slug' => 'services','with_front' => true),
	  'capability_type' =>  'post',
          'public' => true,
          'hierarchical' => true,
	  'supports' => array(
	  'title',
	  'editor',
	  'thumbnail'
	  )
    )
  );       
}

