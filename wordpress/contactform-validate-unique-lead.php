function email_already_exists_landing ( $result, $tags ) {

// retrieve the posted email



$form     = WPCF7_Submission::get_instance();

$origen            = $form->get_posted_data('origen');

$formID = $_POST['_wpcf7'];



if( $origen == 'registroRecetas'){

  $email  = $form->get_posted_data('email');

  $your_email_confirm  = $form->get_posted_data('confirm-your-email');

  //Validacion de existencia en bd segun el correo

  global $wpdb;

  $tbl = $wpdb->base_prefix.'db7_forms';

  $emailValidation = $wpdb->get_results( "SELECT * FROM $tbl WHERE form_post_id = $formID " );

  foreach( $emailValidation as $key ){

    $data = unserialize($key->form_value);

    if( $data['email'] == $email ){

      $result->invalidate('email','Este correo ya se encuentra registrado');

    }

  }



  //Validacion de correos

  if ( $email != $your_email_confirm ) {

  $result->invalidate( 'email', "Los campos no coinciden" );

  $result->invalidate( 'confirm-your-email', "Los campos no coinciden" );

  }

}



return $result;

}

add_filter( 'wpcf7_validate', 'email_already_exists_landing', 9, 2 );