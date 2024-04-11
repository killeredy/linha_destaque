<?php


function my_custom_submenu_page()
{
    add_submenu_page(
        'options-general.php', // Parent menu slug (options-general.php for the Settings menu)
        'Destaque Page',
        'Destaque page',
        'manage_options',
        'destaque-custom-submenu-page',
        'destaque_submenu_page_callback'
    );
}
add_action('admin_menu', 'my_custom_submenu_page');