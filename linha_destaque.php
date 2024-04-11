<?php
/**
 * Plugin Name: Linha Destaques.
 * Plugin URI: http://www.linhaartistica.com.br
 * Description: Criação e gerencimaneto de galeria
 * Version: 1.0
 * Author: Kleber Santos
 */

//require_once 'PageOption/Registros.php';



define('DESTAQUE_PATH', plugin_dir_path(__DIR__) . 'linha_destaque/');
define('DESTAQUE_URL', plugin_dir_url(__DIR__) . 'linha_destaque/');
define('DESTAQUE_UPLOAD_PATH', wp_upload_dir()['basedir'] . "/destaque");
define('DESTAQUE_OPTION', 'destaques_list');



require_once DESTAQUE_PATH . "load.php";

