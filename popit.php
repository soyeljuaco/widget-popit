<?php
/*
Plugin Name: Popit Widget
Plugin URI: http://www.ciudadanointeligente.org
Description: Crea un Widget para añadir a cualquier Sidebar.
Version: 1.0
Author: Joaquín Figueroa
Author URI: http://joaquin.influit.co
*/

/**
 * Función que instancia el Widget
 */

function popit_admin_action() {
    add_management_page("popit", "popit", 1, "popit", "popit_configuracion");
}
add_action('admin_menu', 'popit_admin_action');

function popit_configuracion() {
    if (!current_user_can('manage_options')) {
        wp_die(__('You do not have sufficient permissions to access this page.'));
    }

    $msj = '';
    $msj_class = '';
    if ($_POST['popit_update']) {
            ($_POST['popit_person_id']) ? update_option('popit_person_id', $_POST['popit_person_id']) : update_option('popit_person_id', 0);
            ($_POST['popit_instance']) ? update_option('popit_instance', $_POST['popit_instance']) : update_option('popit_instance', '');
            $msj = 'Datos actualizados correctamente :)';
            $msj_class = 'updated';
    }
    include "popit-wp-admin.php";
}

function popit_get_persons(){
	$instance=get_option('popit_instance');
	$aPersons=array();
	if($instance)
		$aPersons=json_decode(file_get_contents("https://".$instance.".popit.mysociety.org/api/v0.1/persons"));
	return $aPersons;
}

function popit_data_person() {
    $person_id = (get_option('popit_person_id')) ? get_option('popit_person_id') : 0;
    $instance = (get_option('popit_instance')) ? get_option('popit_instance') : '';
    if (is_front_page()) {
        if ($person_id && $instance) {
            //echo 'https://www.chileatiende.cl/api/servicios/' . $elServicio . '/fichas' . '?access_token=' . get_option('cha_access_token');
            $aPerson = json_decode(file_get_contents('https://'.$instance.'.popit.mysociety.org/api/v0.1/persons/' . $person_id));
        }
        include "popit_front.php";
    }
}