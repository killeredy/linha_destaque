<?php


function destaque_submenu_page_callback()
{
    destaque_zip_upload();
    destaque_remove_zip();
    
    $list = get_option(DESTAQUE_OPTION);
?>
    <div class="wrap">
        <h2>Upload ZIP File</h2>
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="zip_file" accept=".zip">
            <input type="submit" name="upload" class="button button-primary" value="Upload">
        </form>
    </div>

    <?php dprint($_POST) ?>



    <div class="wrap">
        <h2>Files List</h2>
        <form method="post" enctype="multipart/form-data">
        <?php if( is_array($list) && !empty($list)  ): ?>
             <table class="wp-list-table widefat fixed striped">
                <thead>
                    <tr>
                        <th class="manage-column column-primary">File</th>
                        <th>path</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($list  as $value ): ?>
                        <tr>
                            <td> <?php echo $value ?> </td>
                            <td> <?php echo DESTAQUE_UPLOAD_PATH .  "/" . $value ?></td>
                            <td> <button type="submit" value="<?=  $value ?>" name="remove-destaque" onclick="removeDestaque('<?=  $value ?>')" >Remove</button> </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else:?>
            <h2>Sem Destaque cadastrados</h2>
        <?php endif; ?>
        </form>
    </div>

    <script>
        function removeDestaque($destaque){
              let text = "Deseja apagar este destaque?";
            if (!confirm(text)) {
                return;
            } 

        }

    </script>

<?php
}
