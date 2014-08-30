<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
<div id="message" class="updated woocommerce-message wc-connect">
	<p><?php echo sprintf( __( '<strong>%s Data Update Required</strong> &#8211; We just need to update your install to the latest version', 'wc-extend-plugin-name' ), WC_Extend_Plugin_Name()->name ); ?></p>
	<p class="submit"><a href="<?php echo add_query_arg( 'do_update_wc_extend_plugin_name', 'true', admin_url('admin.php?page=wc-extend-plugin-name-settings') ); ?>" class="wc-extend-plugin-name-update-now button-primary"><?php _e( 'Run the updater', 'wc-extend-plugin-name' ); ?></a></p>
</div>
<script type="text/javascript">
	jQuery('.wc-extend-plugin-name-update-now').click('click', function(){
		var answer = confirm( '<?php _e( 'It is strongly recommended that you backup your database before proceeding. Are you sure you wish to run the updater now?', 'wc-extend-plugin-name' ); ?>' );
		return answer;
	});
</script>