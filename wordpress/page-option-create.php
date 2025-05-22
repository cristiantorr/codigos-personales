<?php
add_action( 'admin_menu', 'rejiplas_add_admin_menu' );
add_action( 'admin_init', 'rejiplas_settings_init' );


function rejiplas_add_admin_menu(  ) { 

	add_options_page( 'rejiplast options theme', 'rejiplast options theme', 'manage_options', 'rejiplast_options_theme', 'rejiplas_options_page' );

}


function rejiplas_settings_init(  ) { 

	register_setting( 'pluginPage', 'rejiplas_settings' );

	add_settings_section(
		'rejiplas_pluginPage_section', 
		__( 'Your section description', 'rejiplas' ), 
		'rejiplas_settings_section_callback', 
		'pluginPage'
	);

	add_settings_field( 
		'rejiplas_textarea_field_0', 
		__( 'Settings field description', 'rejiplas' ), 
		'rejiplas_textarea_field_0_render', 
		'pluginPage', 
		'rejiplas_pluginPage_section' 
	);


}


function rejiplas_textarea_field_0_render(  ) { 

	$options = get_option( 'rejiplas_settings' );
	?>
	<textarea cols='40' rows='5' name='rejiplas_settings[rejiplas_textarea_field_0]'> 
		<?php echo $options['rejiplas_textarea_field_0']; ?>
 	</textarea>
	<?php

}


function rejiplas_settings_section_callback(  ) { 

	echo __( 'This section description', 'rejiplas' );

}


function rejiplas_options_page(  ) { 

		?>
		<form action='options.php' method='post'>

			<h2>rejiplast options theme</h2>

			<?php
			settings_fields( 'pluginPage' );
			do_settings_sections( 'pluginPage' );
			submit_button();
			?>

		</form>
		<?php

}
