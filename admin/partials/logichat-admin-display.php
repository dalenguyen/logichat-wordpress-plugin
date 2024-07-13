<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Logichat
 * @subpackage Logichat/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div id="wrap">
	<form method="post" action="options.php">
		<?php
			settings_fields( 'Logichat-settings' );
			do_settings_sections( 'Logichat-settings' );
			submit_button();
		?>
	</form>
</div>