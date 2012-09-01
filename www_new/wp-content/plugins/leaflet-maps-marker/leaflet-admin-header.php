<?php
/*
    Admin Header - Leaflet Maps Marker Plugin
*/
?>
<?php 
//info prevent file from being accessed directly
if (basename($_SERVER['SCRIPT_FILENAME']) == 'leaflet-admin-header.php') { die ("Please do not access this file directly. Thanks!<br/><a href='http://www.mapsmarker.com/go'>www.mapsmarker.com</a>"); }
require_once(ABSPATH . "/wp-includes/pluggable.php");
$lmm_options = get_option( 'leafletmapsmarker_options' ); //info: required for bing maps api key check
$admin_quicklink_settings_buttons = ( current_user_can( "activate_plugins" ) ) ? "<a class='button-secondary' href='" . LEAFLET_WP_ADMIN_URL . "admin.php?page=leafletmapsmarker_settings'>".__('Settings','lmm')."</a>" : "";
//info: display info upon first activation
$install_note = (isset($_GET['display']) ? $_GET['display'] : '');
if ( $install_note != NULL ) {
	$install_success_message = sprintf( __('You just successfully installed the "Leaflet Maps Marker" plugin. You can now add your first marker below or optionally <a href="%1$sadmin.php?page=leafletmapsmarker_settings">change the default settings</a>.<br/>For tutorials and help, please check the <a href="%1$sadmin.php?page=leafletmapsmarker_help">Help &amp; Credits page</a>!','lmm'), LEAFLET_WP_ADMIN_URL); 
	echo '<div class="updated" style="padding:10px;"><p>' . $install_success_message . '</p></div>';
	//info: check if custom icons could be unzipped
	if ( ! file_exists(LEAFLET_PLUGIN_ICONS_DIR . DIRECTORY_SEPARATOR . 'information.png') ) {
		echo '<div class="error" style="padding:10px;">'.__('Warning: the custom map icon directory at <code>/wp-contents/uploads/leaflet-maps-marker-icons</code> could not be created due to file permission settings on your webserver. Leaflet Maps Marker will work as designed, but only with one map icon available.<br/>You can add the included map icons manually by following the steps at <a href="http://www.mapsmarker.com/incomplete-installation" target="_blank">http://www.mapsmarker.com/incomplete-installation</a>', 'lmm').'</div>';
	}
	update_option('leafletmapsmarker_update_info', 'hide');
} ?>
<div style="float:right;">
  <div style="text-align:center;"><small><a href="http://www.mapsmarker.com" target="_blank" style="text-decoration:none;">MapsMarker.com</a> supports</small></div>
  <a href="http://www.open3.at" target="_blank" title="open3.at - network for the promotion of Open Society, OpenGov and OpenData in Austria"><img src="<?php echo LEAFLET_PLUGIN_URL ?>img/logo-open3-small.png" width="143" height="30" border="0"/></a></div>
  <div style="font-size:1.5em;margin-bottom:5px;padding:10px 0 0 0;"><span style="font-weight:bold;">Leaflet Maps Marker<sup style="font-size:75%;">&reg;</sup> v<?php echo get_option("leafletmapsmarker_version") ?></span> - "OGD Wien - Meine Platzl im Gr&auml;tzl"-Edition</div>
  <p style="margin:1.5em 0;">
  <a class="button-secondary" href="<?php echo LEAFLET_WP_ADMIN_URL ?>admin.php?page=leafletmapsmarker_markers"><?php _e("List all markers", "lmm") ?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <a class="button-secondary" href="<?php echo LEAFLET_WP_ADMIN_URL ?>admin.php?page=leafletmapsmarker_marker"><?php _e("Add new marker", "lmm") ?></a>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
  <a class="button-secondary" href="<?php echo LEAFLET_WP_ADMIN_URL ?>admin.php?page=leafletmapsmarker_layers"><?php _e("List all layers", "lmm") ?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <a class="button-secondary" href="<?php echo LEAFLET_WP_ADMIN_URL ?>admin.php?page=leafletmapsmarker_layer"><?php _e("Add new layer", "lmm") ?></a>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
  <a class="button-secondary" href="<?php echo LEAFLET_WP_ADMIN_URL ?>admin.php?page=leafletmapsmarker_tools"><?php _e("Tools", "lmm") ?></a>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
  <?php echo $admin_quicklink_settings_buttons ?>
&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
  <a class="button-secondary" href="<?php echo LEAFLET_WP_ADMIN_URL ?>admin.php?page=leafletmapsmarker_help"><?php _e("Help & Credits", "lmm") ?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </p>
<?php
//info: display update info with current release notes
$update_info_action = isset($_POST['update_info_action']) ? $_POST['update_info_action'] : ''; 
//info: dont display on new installs
$new_install = (isset($_GET['display']) ? 'true' : 'false'); 
if ( ($update_info_action == 'hide') && ($new_install == 'false') ) {
	update_option('leafletmapsmarker_update_info', 'hide');
}
if (get_option('leafletmapsmarker_update_info') == 'show') {
	$lmm_version_old = '2.6.1';
	$lmm_version_new = '2.7.1';
	$lmm_changelog_new_version = '<a href="http://www.mapsmarker.com/v' . $lmm_version_new . '" target="_blank">http://www.mapsmarker.com/v' . $lmm_version_new . '</a>';
	$lmm_full_changelog = '<a href="http://www.mapsmarker.com/changelog" target="_blank">http://www.mapsmarker.com/changelog</a>';
	echo '<div class="updated" style="padding:10px;"><p><strong>' . __('Leaflet Maps Marker has been updated successfully!','lmm') . '</strong></p>
		  <p>' . sprintf(__('For more details about this release, please visit %s','lmm'), $lmm_changelog_new_version) . '</p>
			' . sprintf(__('Changelog for version %s:','lmm'), $lmm_version_new) . '
			<table>
			<tr><td>
			<img src="' . LEAFLET_PLUGIN_URL .'img/icon-changelog-new.png">
			</td><td>
			upgrade to leaflet.js v0.4.4 (<a href="http://leaflet.cloudmade.com/2012/07/30/leaflet-0-4-released.html" target=_blank">changelog</a>)
			</td></tr>
			<tr><td>
			<img src="' . LEAFLET_PLUGIN_URL .'img/icon-changelog-new.png">
			</td><td>
			option to add an unobtrusive scale control to maps
			</td></tr>
			<tr><td>
			<img src="' . LEAFLET_PLUGIN_URL .'img/icon-changelog-new.png">
			</td><td>
			support for Retina displays to display maps in a higher resolution
			</td></tr>
			<tr><td>
			<img src="' . LEAFLET_PLUGIN_URL .'img/icon-changelog-new.png">
			</td><td>
			boxzoom option (whether the map can be zoomed to a rectangular area specified by dragging the mouse while pressing shift)
			</td></tr>
			<tr><td>
			<img src="' . LEAFLET_PLUGIN_URL .'img/icon-changelog-new.png">
			</td><td>
			worldCopyJump option (the map tracks when you pan to another "copy" of the world and moves all overlays like markers and vector layers there)
			</td></tr>
    		<tr><td>
			<img src="' . LEAFLET_PLUGIN_URL .'img/icon-changelog-new.png">
			</td><td>
			keyboard navigation support for maps
			</td></tr>
    		<tr><td>
			<img src="' . LEAFLET_PLUGIN_URL .'img/icon-changelog-new.png">
			</td><td>
			options to customize marker popups (min/max width, scrollbar...)
			</td></tr>
			<tr><td>
			<img src="' . LEAFLET_PLUGIN_URL .'img/icon-changelog-new.png">
			</td><td>
			add support for maps that do not reflect the real world (e.g. game, indoor or photo maps)
			</td></tr>
			<tr><td>
			<img src="' . LEAFLET_PLUGIN_URL .'img/icon-changelog-new.png">
			</td><td>
			zoom level can now also be edited directly on marker/layer maps on backend
			</td></tr>
			<tr><td>
			<img src="' . LEAFLET_PLUGIN_URL .'img/icon-changelog-new.png">
			</td><td>
			added bing/google/mapbox/cloudmad basemaps to mass actions on tools page
			</td></tr>
			<tr><td>
			<img src="' . LEAFLET_PLUGIN_URL .'img/icon-changelog-new.png">
			</td><td>
			Ukrainian translation thanks to Andrexj, <a href="http://all3d.com.ua" target="_blank">http://all3d.com.ua</a>
			</td></tr>
			<tr><td>
			<img src="' . LEAFLET_PLUGIN_URL .'img/icon-changelog-new.png">
			</td><td>
			Slovak translation thanks to Zdenko Podobny
			</td></tr>
			<tr><td>
			<img src="' . LEAFLET_PLUGIN_URL .'img/icon-changelog-new.png">
			</td><td>
			added config options for marker icons and shadow image in settings (size, offset...)
			</td></tr>
			<tr><td>
			<img src="' . LEAFLET_PLUGIN_URL .'img/icon-changelog-new.png">
			</td><td>
			show marker icons directory (especially needed for blogs on WordPress Multisite installations)
			</td></tr>
			<tr><td>
			<img src="' . LEAFLET_PLUGIN_URL .'img/icon-changelog-new.png">
			</td><td>
			option to show marker name as icon tooltip (enabled by default)
			</td></tr>
			<tr><td>
			<img src="' . LEAFLET_PLUGIN_URL .'img/icon-changelog-new.png">
			</td><td>
			add css-classes to each marker icon automatically
			</td></tr>
			<tr><td>
			<img src="' . LEAFLET_PLUGIN_URL .'img/icon-changelog-new.png">
			</td><td>
			added routing provider OSRM (<a href="http://map.project-osrm.org" target="_blank">http://map.project-osrm.org</a>)
			</td></tr>
			<tr><td>
			<img src="' . LEAFLET_PLUGIN_URL .'img/icon-changelog-new.png">
			</td><td>
			option to customize Google Maps base domain
			</td></tr>
			<tr><td>
			<img src="' . LEAFLET_PLUGIN_URL .'img/icon-changelog-new.png">
			</td><td>
			marker/layer name gets added as &lt;title&gt; on fullscreen maps
			</td></tr>
			<tr><td>
			<img src="' . LEAFLET_PLUGIN_URL .'img/icon-changelog-new.png">
			</td><td>
			list of markers can now also be displayed below multi-layer-maps
			</td></tr>
			<tr><td>
			<img src="' . LEAFLET_PLUGIN_URL .'img/icon-changelog-new.png">
			</td><td>
			added option to set opacity for overlays
			</td></tr>
			<tr><td>
			<img src="' . LEAFLET_PLUGIN_URL .'img/icon-changelog-new.png">
			</td><td>
			support for TMS services for custom basemaps (inversed Y axis numbering for tiles)
			</td></tr>
			<tr><td>
			<img src="' . LEAFLET_PLUGIN_URL .'img/icon-changelog-changed.png">
			</td><td>
			secure loading of Google API via https instead of http
			</td></tr>
			<tr><td>
			<img src="' . LEAFLET_PLUGIN_URL .'img/icon-changelog-changed.png">
			</td><td>
			enhanced Google Maps language localization options (for maps, directions and autocomplete)
			</td></tr>
			<tr><td>
			<img src="' . LEAFLET_PLUGIN_URL .'img/icon-changelog-changed.png">
			</td><td>
			optimized usability for forms and marker icon selection on backend
			</td></tr>
			<tr><td>
			<img src="' . LEAFLET_PLUGIN_URL .'img/icon-changelog-changed.png">
			</td><td>
			removed translation .po files from plugin to reduce file size
			</td></tr>
			<tr><td>
			<img src="' . LEAFLET_PLUGIN_URL .'img/icon-changelog-changed.png">
			</td><td>
			merged &amp; compressed google-maps.js, bing.js &amp;  into leaflet.js to save http requests
			</td></tr>
			<tr><td>
			<img src="' . LEAFLET_PLUGIN_URL .'img/icon-changelog-changed.png">
			</td><td>
			changed default color for panel text to #373737 for new installations
			</td></tr>
			<tr><td>
			<img src="' . LEAFLET_PLUGIN_URL .'img/icon-changelog-changed.png">
			</td><td>
			moved "General Map settings" from tab "Misc" to "Basemaps"
			</td></tr>
			<tr><td>
			<img src="' . LEAFLET_PLUGIN_URL .'img/icon-changelog-changed.png">
			</td><td>
			GeoJSON AJAX calls for layer maps are not cached anymore to deliver more current results
			</td></tr>
			<tr><td>
			<img src="' . LEAFLET_PLUGIN_URL .'img/icon-changelog-changed.png">
			</td><td>
			optimized OGD Vienna selector (considers switch to other default basemaps)
			</td></tr>
			<tr><td>
			<img src="' . LEAFLET_PLUGIN_URL .'img/icon-changelog-changed.png">
			</td><td>
			updated German translation
			</td></tr>
			<tr><td>
			<img src="' . LEAFLET_PLUGIN_URL .'img/icon-changelog-changed.png">
			</td><td>
			updated French translation thanks to Vincèn Pujol, <a href="http://www.skivr.com" target="_blank">http://www.skivr.com</a> and Rodolphe Quiedeville, <a href="http://rodolphe.quiedeville.org/" target="_blank">http://rodolphe.quiedeville.org/</a>
			</td></tr>
			<tr><td>
			<img src="' . LEAFLET_PLUGIN_URL .'img/icon-changelog-changed.png">
			</td><td>
			updated Spanish translation thanks to Alvaro Lara, <a href="http://www.alvarolara.com" target="_blank">http://www.alvarolara.com</a>
			</td></tr>			
			<tr><td>
			<img src="' . LEAFLET_PLUGIN_URL .'img/icon-changelog-changed.png">
			</td><td>
			updated Italian translation thanks to Luca Barbetti, <a href="http://twitter.com/okibone" target="_blank">http://twitter.com/okibone</a>
			</td></tr>
			<tr><td>
			<img src="' . LEAFLET_PLUGIN_URL .'img/icon-changelog-changed.png">
			</td><td>
			updated Catalan translation thanks to Vicent Cubells, <a href="http://vcubells.net" target="_blank">http://vcubells.net</a>
			</td></tr>
			<tr><td>
			<img src="' . LEAFLET_PLUGIN_URL .'img/icon-changelog-fixed.png">
			</td><td>
			the selection of shortcodes via tinymce popup on posts/pages editor was broken on iOS devices
			</td></tr>
			<tr><td>
			<img src="' . LEAFLET_PLUGIN_URL .'img/icon-changelog-fixed.png">
			</td><td>
			fixed broken links in multi-layer-maps-list and default state controlbox on layer maps on backend 
			</td></tr>
			<tr><td>
			<img src="' . LEAFLET_PLUGIN_URL .'img/icon-changelog-fixed.png">
			</td><td>
			manual language selection for Chinese and Yiddish was broken
			</td></tr>
			<tr><td>
			<img src="' . LEAFLET_PLUGIN_URL .'img/icon-changelog-fixed.png">
			</td><td>
			overwrite box-shadow attribute from style.css to remove border on some themes
			</td></tr>
			<tr><td>
			<img src="' . LEAFLET_PLUGIN_URL .'img/icon-changelog-fixed.png">
			</td><td>
			linebreak was added to mapquest logo in attribution box on some templates
			</td></tr>
			<tr><td>
			<img src="' . LEAFLET_PLUGIN_URL .'img/icon-changelog-fixed.png">
			</td><td>
			Google API key was not loaded on backend
			</td></tr>
			<tr><td>
			<img src="' . LEAFLET_PLUGIN_URL .'img/icon-changelog-fixed.png">
			</td><td>
			attribution text for Google Maps provider was hidden
			</td></tr>
			<tr><td>
			<img src="' . LEAFLET_PLUGIN_URL .'img/icon-changelog-fixed.png">
			</td><td>
			Marker/layer repositioning via Google address search did not changed basemap to Bing/Google
			</td></tr>
			<tr><td>
			<img src="' . LEAFLET_PLUGIN_URL .'img/icon-changelog-fixed.png">
			</td><td>
			switching basemaps caused attribution text not to clear first
			</td></tr>
			<tr><td>
			<img src="' . LEAFLET_PLUGIN_URL .'img/icon-changelog-fixed.png">
			</td><td>
			<html>-tags in geotags are now stripped as they caused 404 messages
			</td></tr>
			</table>
			<p>' . sprintf(__('If you upgraded from a version <%s, please visit %s for a complete list of changes.','lmm'), $lmm_version_old, $lmm_full_changelog) . '</p>
			<p><strong>' . __('If you like using the plugin, please consider <a href="http://www.mapsmarker.com/donations" target="_blank">making a donation</a> and <a href="http://wordpress.org/extend/plugins/leaflet-maps-marker/" target="_blank">rate the plugin on wordpress.org</a> - thanks!','lmm') . '</strong></p>
			<form method="post">
			<input type="hidden" name="update_info_action" value="hide" />
			<input class="button-secondary" type="submit" value="' . __('remove message', 'lmm') . '"/></form></div>'.PHP_EOL;
}
?>
<?php
//info: check if bing maps api key is defined
if (( (($lmm_options['standard_basemap'] == 'bingaerial') || ($lmm_options['standard_basemap'] == 'bingaerialwithlabels') || ($lmm_options['standard_basemap'] == 'bingroad')) 
|| ((isset($lmm_options[ 'controlbox_bingaerial' ]) == TRUE ) && ($lmm_options[ 'controlbox_bingaerial' ] == 1 )) 
|| ((isset($lmm_options[ 'controlbox_bingaerialwithlabels' ]) == TRUE ) && ($lmm_options[ 'controlbox_bingaerialwithlabels' ] == 1 )) 
|| ((isset($lmm_options[ 'controlbox_bingroad' ]) == TRUE ) && ($lmm_options[ 'controlbox_bingroad' ] == 1 )) 
) && ( isset($lmm_options['bingmaps_api_key']) && ($lmm_options['bingmaps_api_key'] == NULL ) 
)) {
	echo '<p><div class="error" style="padding:10px;">' . __('<strong>Warning: you enabled support for bing maps but did not provide an API key. Please visit <a href="http://www.mapsmarker.com/bing-maps" target="_blank">http://www.mapsmarker.com/bing-maps</a> for info on how to get a free bing maps API key!','lmm') . '</strong></div></p>';
}
//info: check for incompabilities with other plugins
if (is_plugin_active('jquery-colorbox/jquery-colorbox.php') ) {
	$lmm_jquery_colorbox_options = get_option( 'jquery-colorbox_settings' );
	if ($lmm_jquery_colorbox_options['autoColorbox'] == TRUE) { 
		echo '<p><div class="error" style="padding:10px;">' . __('<strong>Warning: you are using the plugin jQuery Colorbox which is causing maps to break!</strong><br/><br/>Here is how to fix this:<br/>1. click on to "Settings" / "jQuery Colorbox" in your WordPress admin menu<br/>2. Uncheck the setting "Automate jQuery Colorbox for all images in pages, posts and galleries:"<br/>3. check the setting "Automate jQuery Colorbox for images in WordPress galleries only:" instead<br/>4. save changes<br/><br/>This message will disappear automatically when the jQuery Colorbox option was updated.','lmm') . '</div></p>';
	} 
}
if (is_plugin_active('cforms/cforms.php') ) {
	$lmm_cforms_options = get_option( 'cforms_settings' );
	if ($lmm_cforms_options['global'][ 'cforms_show_quicktag_js' ] == FALSE) { 
		echo '<p><div class="error" style="padding:10px;">' . __('<strong>Warning: you are using the plugin cformsII which is causing the TinyMCE editor to break when creating new maps!</strong><br/><br/>Here is how to fix this:<br/>1. click on to "cformsII" / "Global Settings" in your WordPress admin menu<br/>2. open the tab "WP Editor Button support"<br/>3. check the option "Fix TinyMCE error"<br/>4. save changes<br/><br/>If you do not see this option in your settings, please upgrade to the latest version first (this has to be done manually - see plugin website http://www.deliciousdays.com/cforms-plugin/ for details)<br/><br/>This message will disappear automatically when the cformsII option "Fix TinyMCE error" is checked.','lmm') . '</div></p>';
	} 
}
if (is_plugin_active('wp-google-analytics/wp-google-analytics.php') ) {
	echo '<p><div class="error" style="padding:10px;">' . __('<strong>Warning: you are using the outdated plugin WP Google Analytics which is incompatible with Leaflet Maps Marker. Please update to a more current Google analytics plugin like http://wordpress.org/extend/plugins/google-analytics-for-wordpress/','lmm') . '</strong></div></p>';
}
if (is_plugin_active('bwp-minify/bwp-minify.php') ) {
	$lmm_bwpminify_options = get_option( 'bwp_minify_general' );
	if ($lmm_bwpminify_options['enable_min_js'] == 'yes') { 
		if (strpos($lmm_bwpminify_options['input_ignore'], 'leafletmapsmarker') === false)  { 
			echo '<p><div class="error" style="padding:10px;">' . __('<strong>Warning: you are using the plugin "Better WordPress Minify" which can cause Leaflet Maps Marker to break if the option "Minify JS files automatically?" is active. Please disable this option (Settings / BWP Minify) or add <strong>leafletmapsmarker</strong> to the form field "Scripts to be ignored (not minified)"','lmm') . '</strong></div></p>';
		}
	}
}
?>
<table cellpadding="5" cellspacing="0" style="border:1px solid #ccc;width:98%;background:#efefef;">
  <tr>
    <td valign="center"><div style="float:left;"><a href="http://www.mapsmarker.com" target="_blank" title="www.MapsMarker.com"><img src="<?php echo LEAFLET_PLUGIN_URL ?>img/logo-mapsmarker.png" width="156" height="125" alt="Leaflet Maps Marker Plugin Logo by Susanne Mandl - www.greenflamingomedia.com" /></a></div>
<div style="float:right;"> 
        <!--Begin support table-->
        <table cellspacing="5">
          <tr>
           <td style="background:#fff;text-align:center;">
<form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="ZKVA3VKMEU2TA">
<?php if ( (defined('WPLANG')) && (strtoupper(substr(WPLANG, 0, 2)) == 'EN') ) { 
		echo '<input type="hidden" name="LC" value="EN">';
	} else if ( (defined('WPLANG')) && (strtoupper(substr(WPLANG, 0, 2)) == 'FR') ) {
		echo '<input type="hidden" name="LC" value="FR">';
	} else if ( (defined('WPLANG')) && (strtoupper(substr(WPLANG, 0, 2)) == 'CN') ) {
		echo '<input type="hidden" name="LC" value="CN">';
	} else if ( (defined('WPLANG')) && (strtoupper(substr(WPLANG, 0, 2)) == 'DE') ) {
		echo '<input type="hidden" name="LC" value="DE">';
	} else if ( (defined('WPLANG')) && (strtoupper(substr(WPLANG, 0, 2)) == 'IT') ) {
		echo '<input type="hidden" name="LC" value="IT">';
	} else if ( (defined('WPLANG')) && (strtoupper(substr(WPLANG, 0, 2)) == 'JP') ) {
		echo '<input type="hidden" name="LC" value="JP">';
	} else if ( (defined('WPLANG')) && (strtoupper(substr(WPLANG, 0, 2)) == 'ES') ) {
		echo '<input type="hidden" name="LC" value="ES">';
	} else { 
		echo '<input type="hidden" name="LC" value="EN">';
	} ?>
<table>
<tr><td><input type="hidden" name="on0" value="Sponsorship Level">
	<select name="os0" style="width:210px;">
	<option value="Supporter 2">Please select sponsorship level</option>
	<option value="Contributor">Contributor €1,00 EUR</option>
	<option value="Contributor">Contributor €5,00 EUR</option>
	<option value="Supporter">Supporter €10,00 EUR</option>
	<option value="Supporter 2">Supporter €25,00 EUR</option>
	<option value="Donor">Donor €50,00 EUR</option>
	<option value="Sponsor">Sponsor €100,00 EUR</option>
	<option value="Benefactor">Benefactor €250,00 EUR</option>
	<option value="Patron">Patron €500,00 EUR</option>
	<option value="Open Source Angel">Open Source Angel €1.000,00 EUR</option>
	<option value="Corporate Angel">Corporate Angel €2.500,00 EUR</option>
</select> </td></tr>
<tr><td colspan="2"><input type="hidden" name="on1" value="Message"><?php _e('Message','lmm') ?> <input type="text" name="os1" maxlength="200"></td></tr>
</table>
<input type="hidden" name="currency_code" value="EUR">
<input type="image" src="<?php echo LEAFLET_PLUGIN_URL ?>img/donate-paypal.jpg" width="130" height="89" border="0" name="submit" alt="" title="<?php esc_attr_e('If you like to donate a certain amount of money to show your support, you can also use Paypal. If you don´t have a Paypal account, you can use your credit card or bank account (where available). Please click on the paypal image to proceed to the donation form.','lmm') ?>">
</form>
            </td>
            <td style="background:#fff;width:115px;text-align:center;"><a href="http://www.amazon.com/exec/obidos/redirect-home?tag=leafletmapsmarker-21&site=home" target="_blank" title="<?php esc_attr_e('The easiest way to support this plugin is to buy something from Amazon by using this referrer link. Note: this doesn´t cost you anything as your purchase volume won´t be increased, but I will receive 6 per cent of your purchase volume as a referral fee.','lmm') ?>"><img src="<?php echo LEAFLET_PLUGIN_URL ?>img/donate-amazon-partnernet.jpg" style="border:1px solid #ccc;padding:4px;" width="84" height="40" border="0"/></a>
		<br/><a href="http://www.amazon.de/registry/wishlist/3P6LQRP11V1AF" target="_blank" title="<?php esc_attr_e('Another way to show your support for this plugin is to buy something from my Amazon wishlist, respectively sending me a greeting card worth from 15 to 500 $ with a personal note, which I would very much appreciate.','lmm') ?>"><img src="<?php echo LEAFLET_PLUGIN_URL ?>img/donate-amazon.jpg" width="100" height="50" border="0"/></a><br/><a href="http://flattr.com/thing/447395/MapsMarker-com" target="_blank">
<img src="<?php echo LEAFLET_PLUGIN_URL ?>img/donate-flattr.png" alt="Flattr this" title="Flattr this" border="0" /></a></td>
          </tr>
        </table>
        <!--End support table-->
      </div>
	<p><strong><?php _e('A message from the plugin´s author','lmm') ?> <a href="http://www.harm.co.at" target="_blank" title="<?php esc_attr_e('Show website of plugin author','lmm') ?>" style="text-decoration:none;">Robert Harm</a>:</strong><br/>
			<?php _e('It is hard to continue development and support for Leaflet Maps Marker-plugin without contributions from users like you.','lmm') ?> <?php _e('If you enjoy using the plugin - <strong>particularly within a commercial context</strong> - please consider making a donation.','lmm') ?> <?php _e('Your donation help keeping the plugin free for everyone and allow me to spend more time on developing, maintaining and support.','lmm') ?> <?php _e('I´d be happy to accept your donation! Thanks!','lmm') ?> <?php _e('For more information on how to donate, please visit','lmm') ?>  <a href="http://mapsmarker.com/donations" style="text-decoration:none;" target="_blank">http://mapsmarker.com/donations</a><br/><br/>Web: <a href="http://www.mapsmarker.com"  style="text-decoration:none;" target="_blank">MapsMarker.com</a> (<a href="http://www.mapsmarker.com/legal"  style="text-decoration:none;" target="_blank"><?php _e('Legal','lmm'); ?></a>) &nbsp;&nbsp;|&nbsp;&nbsp;<a href="http://twitter.com/mapsmarker" style="text-decoration:none;" target="_blank">Twitter</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="http://www.facebook.com/mapsmarker" style="text-decoration:none;" target="_blank">Facebook</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="http://www.mapsmarker.com/changelog" style="text-decoration:none;" target="_blank"><?php _e('Changelog','lmm') ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="https://github.com/robertharm/Leaflet-Maps-Marker" style="text-decoration:none;" target="_blank">Github</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="http://translate.mapsmarker.com/projects/lmm"  style="text-decoration:none;" target="_blank" title="<?php esc_attr_e('please help translating this plugin','lmm') ?>"><?php _e('Translations','lmm') ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="http://wordpress.org/extend/plugins/leaflet-maps-marker/"  style="text-decoration:none;" target="_blank" title="<?php esc_attr_e('please rate this plugin on wordpress.org','lmm') ?>"><?php _e('Rate plugin','lmm') ?></a></p></td>
  </tr>
</table>