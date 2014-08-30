<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
<div id="message" class="updated woocommerce-message wc-connect">
	<p><?php echo sprintf( __( '<strong>Thank you for installing %s</strong> &#8211; We hope you like using it, rate it and share it with others. :)', 'wc-extend-plugin-name' ), WC_Extend_Plugin_Name()->name ); ?></p>
	<?php if(version_compare(WC_EXTEND_WOOVERSION, "1.6.6", '<=')){ ?>
	<p class="submit"><a href="<?php echo admin_url('admin.php?page=woocommerce_settings&tab=' . WC_EXTEND_PLUGIN_NAME_PAGE); ?>" class="button-primary"><?php echo sprintf( __( '%s Settings', 'wc-extend-plugin-name' ), WC_Extend_Plugin_Name()->name ); ?></a></p>
	<?php }else{ ?>
	<p class="submit"><a href="<?php echo admin_url('admin.php?page=wc-settings&tab=' . WC_EXTEND_PLUGIN_NAME_PAGE); ?>" class="button-primary"><?php echo sprintf( __( '%s Settings', 'wc-extend-plugin-name' ), WC_Extend_Plugin_Name()->name ); ?></a></p>
	<?php } ?>
</div>