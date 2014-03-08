<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
<div id="message" class="updated woocommerce-message wc-connect">
	<p><?php _e( sprintf( '<strong>Your theme does not declare %s support</strong> &#8211; if you encounter layout issues please read the integration guide or choose a theme that is compatible with %s.', WC_Extend_Plugin_Name()->name, WC_Extend_Plugin_Name()->name ), 'wc_extend_plugin_name' ); ?></p>
	<p class="submit"><a href="<?php echo esc_url( apply_filters( 'wc_extend_plugin_name_theme_docs_url', WC_Extend_Plugin_Name()->doc_url . 'theme-compatibility-intergration/', 'theme-compatibility' ) ); ?>" class="button-primary"><?php _e( 'Theme Integration Guide', 'wc_extend_plugin_name' ); ?></a> <a class="skip button-primary" href="<?php echo esc_url( add_query_arg( 'hide_wc_extend_plugin_name_theme_support_check', 'true' ) ); ?>"><?php _e( 'Hide this notice', 'wc_extend_plugin_name' ); ?></a></p>
</div>