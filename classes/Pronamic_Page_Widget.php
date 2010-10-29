<?php

/**
 * Title: Pronamic Google Maps widget
 * Description: 
 * Copyright: Copyright (c) 2005 - 2010
 * Company: Pronamic
 * @author Remco Tolsma
 * @version 1.0
 * @doc http://codex.wordpress.org/Widgets_API
 *      http://codex.wordpress.org/Function_Reference/wp_enqueue_script
 */
class Pronamic_Page_Widget extends WP_Widget {
	/**
	 * The text domain
	 *
	 * @var string
	 */
	const TEXT_DOMAIN = 'ppw';

	//////////////////////////////////////////////////

	/**
	 * The basename of this plugin
	 * 
	 * @var string
	 */
	public static $baseName = '';

	/**
	 * The path to this plugin
	 * 
	 * @var string
	 */
	public static $pluginPath = '';

	/**
	 * The url to this plugin
	 *
	 * @var string
	 */
	public static $pluginUrl = '';

	//////////////////////////////////////////////////

	/**
	 * Constructs and initialize the Google Maps meta box
	 */
	public function Pronamic_Page_Widget() {
		$description = __('Use this widget to add an page as a widget.', self::TEXT_DOMAIN);
		$widgetOptions = array('classname' => 'pronamic_page_widget', 'description' => $description);
		$controlOptions = array('width' => 500);

		parent::WP_Widget('pronamic_page', __('Page', self::TEXT_DOMAIN), $widgetOptions, $controlOptions);
	}

	public function widget($arguments, $instance) {
		extract($arguments);

		global $post;
		$post = get_post($instance['page_id']);

		global $pronamicPageWidget;
		$pronamicPageWidget = new stdClass();		
		$pronamicPageWidget->sidebarId = $id;
		$pronamicPageWidget->widgetId = $widget_id;

		if($post) {
			setup_postdata($post);

			$templates = array();
			$templates[] = 'widget-page-' . $id . '.php';
			$templates[] = 'widget-page-' . $widget_id . '.php';
			$templates[] = 'widget-page' . $post->post_name . '.php'; 
			$templates[] = 'widget-page' . $post->ID . '.php';
			$templates[] = 'widget-page.php';

			$template = locate_template($templates);

			if(!$template) {
				$template = self::$pluginPath . '/views/widget-page.php';
			}

			$template = apply_filters('widget_page_template', $template);

			if($template) {
				echo $before_widget;

				include $template;

				echo $after_widget;
			}
		}

		$isPronamicPageWidget = null;		
	} 

	public function update($newInstance, $oldInstance) {
		$instance = $oldInstance;

		$instance['page_id'] = $newInstance['page_id'];
		
        return $instance;		
	}

	public function form($instance) {
		$instance = wp_parse_args((array) $instance, array(
			'page_id' => false 
		));

		wp_dropdown_pages(array(
			'depth' => 3 , 
			'selected' => $instance['page_id'] ,
			 'name' => $this->get_field_name('page_id') 
		));
	}
}
