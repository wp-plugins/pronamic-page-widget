<?php
/*
Plugin Name: Pronamic Page Widget
Plugin URI: http://pronamic.eu/wordpress/page-widget/
Description: This plugin makes it simple to add a page to an widget area.
Version: 1.0
Requires at least: 3.0
Author: Pronamic
Author URI: http://pronamic.eu/
License: GPL
*/

require_once 'classes/Pronamic_Page_Widget.php';

Pronamic_Page_Widget::$baseName = plugin_basename(__FILE__);
Pronamic_Page_Widget::$pluginPath = plugin_dir_path(__FILE__);
Pronamic_Page_Widget::$pluginUrl = plugin_dir_url(__FILE__);

function pronamic_page_widget_init() {
	register_widget('Pronamic_Page_Widget');
}

add_action('widgets_init', 'pronamic_page_widget_init');

function pronamic_is_page_widget($id = null) {
	global $pronamicPageWidget;

	if(isset($pronamicPageWidget)) {
		if($id != null) {
			return $pronamicPageWidget->widgetId == $id;
		} else {
			return true;
		}
	} else {
		return false;
	}
}

function pronamic_is_page_widget_on_sidebar($id = '') {
	global $pronamicPageWidget;

	if(isset($pronamicPageWidget)) {
		return $pronamicPageWidget->sidebarId == $id;
	} else {
		return false;
	}
}