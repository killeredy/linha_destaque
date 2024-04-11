<?php


// Function to handle form submission
function destaque_zip_upload()
{
    if (isset($_POST['upload'])) {
        if (!empty($_FILES['zip_file']['name'])) {
            WP_Filesystem();
            $uploaded_file = $_FILES['zip_file'];
            $upload_dir = DESTAQUE_UPLOAD_PATH;
            $name = sanitize_title($uploaded_file['name']);
            $name = str_replace("-zip", "", $name);
            $upload_file_content = $upload_dir . "/" . $name;

            if (!is_dir($upload_dir)) {
                mkdir($upload_dir);
            }

            if (!is_dir($upload_file_content)) {
                mkdir($upload_file_content);
            }

            $zip_path = $upload_dir . '/' . $uploaded_file['name'];

            // Move the uploaded file to uploads directory
            $success = move_uploaded_file($uploaded_file['tmp_name'], $zip_path);

            // Unzip the file
            $unzip = unzip_file($zip_path, $upload_file_content);

            // Check if unzip was successful
            if (is_wp_error($unzip)) {
                echo '<div class="error"><p>Error: ' . $unzip->get_error_message() . '</p></div>';
            } else {
                destaque_save_data($name);
                echo '<div class="updated"><p>ZIP file uploaded and extracted successfully.</p></div>';
            }

            unlink($zip_path);

        } else {
            echo '<div class="error"><p>Please select a ZIP file to upload.</p></div>';
        }
    }
}

function destaque_remove_zip(){
    if (isset($_POST['remove-destaque'])) {
        $name =  $_POST['remove-destaque'];
        $zip_path =  DESTAQUE_UPLOAD_PATH . '/' . $name;
        $success_msg =  "Destaque apagado com sucesso";
        $erro_msg =  "Erro ao apagar destaque";

        
        
        
        
        if (is_dir($zip_path)) {
            require_once ( ABSPATH . 'wp-admin/includes/class-wp-filesystem-base.php' );
            require_once ( ABSPATH . 'wp-admin/includes/class-wp-filesystem-direct.php' );
            $fileSystemDirect = new WP_Filesystem_Direct(false);
            $success  =  $fileSystemDirect->rmdir($zip_path, true);

       
            if($success){
                destaque_remove_data($name);
                destaque_show_msg(true, $success_msg);  
            }else{
                destaque_show_msg(false, $erro_msg);  
            }


        }else{
            destaque_show_msg(false, $erro_msg .  " #2");

        }


        
    }
}



function destaque_save_data($name)
{
    $list = get_option(DESTAQUE_OPTION);
    if (!is_array($list)) {
        $list = array();
    }

    $list[] = $name;
    update_option(DESTAQUE_OPTION, $list);
}

function destaque_remove_data($name)
{
    $list = get_option(DESTAQUE_OPTION);
    if (!is_array($list)) {
        $list = array();
        update_option(DESTAQUE_OPTION, $list);
        return;
    }

    $new_list = array_filter($list, function($item) use ($name) {
        $zip_path =  DESTAQUE_UPLOAD_PATH .  "/" .  $item;
        return $item != $name &&  is_dir($zip_path) ;
    });

}


function destaque_show_msg($success, $msg){
     if ($success) {
                echo '<div class="error"><p>Error: ' .$msg . '</p></div>';
    } else {
        echo '<div class="updated"><p>'.  $msg .'</p></div>';
    }
}