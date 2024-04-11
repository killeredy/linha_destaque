<?php

//-----------DESTAQUE ------------------//
// Add Shortcode
function ld_destaque_render($atts = null, $content = null)
{
	$atts = shortcode_atts(
		array(
			'destaque' => '',
		),
		$atts
	);
	// $content = do_shortcode($content);

	$path = plugin_dir_path(__DIR__) . "linha_destaque/destaques/" . $atts['destaque'] . "/index.php";
	$url = plugin_dir_url(__DIR__) . "linha_destaque/destaques/" . $atts['destaque'] . "/index.html";

	ob_start();
	?>
	<div class="destaque-content">
		<div class="bg">
			<iframe src="<?= $url ?>" frameborder="0" style="width: 100%; height: 100%" scrolling="no"></iframe>
		</div>
		<div class="text">
			<?= $content ?>
		</div>
	</div>

	<?php
	$output = ob_get_contents();
	ob_end_clean();
	return $output;
}
add_shortcode('linha_destaque_render', 'ld_destaque_render');



?>