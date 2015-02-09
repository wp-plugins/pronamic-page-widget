=== Pronamic Page Widget ===
Contributors: pronamic, remcotolsma 
Tags: pronamic, page widget, sidebar, page sidebar, widget area, template hierarchy, conditional tags, deprecated
Requires at least: 3.0
Tested up to: 3.0
Stable tag: 1.0.2

Deprecated — This plugin makes it easy to add pages as an widget to your sidebars. Developers can easily develop
templates for the different page widget on different sidebars. 

== Description ==

> This plugin is deprecated so Pronamic wil no longer support and maintain this plugin.
>
> If you want to help maintain the plugin, fork it on [GitHub](https://github.com/pronamic/wp-pronamic-page-widget) and open pull requests.


= Template Hierarchy =

1.	widget-page-{sidebar_id}.php
2.	widget-page-{widget_id}.php
3.	widget-page-{page_slug}.php
4.	widget-page-{page_id}.php
5.	widget-page.php

http://codex.wordpress.org/Template_Hierarchy

=  Conditional Tags =

*	**pronamic_is_page_widget**
	When any Pronamic Page Widget is being displayed.

*	**pronamic_is_page_widget('pronamic_page-1')**
	When Pronamic Page Widet with id 1 is being displayed.

*	**pronamic_is_page_widget_on_sidebar('primary-widget-area')**
	When a Pronamic Page Widget is begin displayed on an sidebar with the id "primary-widget-area"

http://codex.wordpress.org/Conditional_Tags

= How to use? =

**Pronamic Page Widget template**

	<h2 class="entry-title">
		<?php the_title(); ?>
	</h2>
	
	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div>

**Adjust the excerpth length**
Example of how you can adjust the excerpt length of the page widgets.

	function pronamic_excerpt_length($length) {
		if(pronamic_is_page_widget_on_sidebar('primary-widget-area')) {
			return 250;
		} elseif(pronamic_is_page_widget('pronamic_page-3')) {
			return 100;
		} elseif(pronamic_is_page_widget()) {
			return 50;
		} else {
			return 40;
		}
	}

	add_filter('excerpt_length', 'pronamic_excerpt_length');


== Installation ==

Extract the zip file and just drop the contents in the wp-content/plugins/ directory of your 
WordPress installation and then activate the Plugin from Plugins page.


== Screenshots ==

1. The WordPress admin widgets area with 2 Pronamic Page Widgets

2. The TwentyTen theme with 2 Pronamic Page Widgets in the primary widget area


== Changelog ==

= 1.0.2 =
*	Added deprecated notice.

= 1.0.1 =
*	Fixed typo in the templates array used for the locate_template() function

= 1.0 =
*	Initial release


== Links ==

*	[Pronamic](http://pronamic.eu/)
*	[Remco Tolsma](http://remcotolsma.nl/)
*	[Markdown's Syntax Documentation][markdown syntax]

[markdown syntax]: http://daringfireball.net/projects/markdown/syntax
            "Markdown is what the parser uses to process much of the readme file"


== Pronamic plugins ==

*	[Pronamic Google Maps](http://wordpress.org/extend/plugins/pronamic-google-maps/)
*	[Gravity Forms (nl)](http://wordpress.org/extend/plugins/gravityforms-nl/)
*	[Pronamic Page Widget](http://wordpress.org/extend/plugins/pronamic-page-widget/)
*	[Pronamic Page Teasers](http://wordpress.org/extend/plugins/pronamic-page-teasers/)
*	[Maildit](http://wordpress.org/extend/plugins/maildit/)
*	[Pronamic Framework](http://wordpress.org/extend/plugins/pronamic-framework/)
*	[Pronamic iDEAL](http://wordpress.org/extend/plugins/pronamic-ideal/)

