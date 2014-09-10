=== Metaphor Shortcodes ===
Contributors: metaphorcreations
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=WSERTX5M7NKES
Tags: shortcodes, column grid, pricing tables, post sliders, post blocks, posts
Requires at least: 3.2
Tested up to: 4.0
Stable tag: /trunk/
License: GPL2

Custom pack of shortcodes including a shortcode generator.

== Description ==

Custom pack of shortcodes including a shortcode generator.

* Grid Shortcode
* Post Slider Shortcode
* Post Block Shortcode
* Pricing Table Shortcode
* Slide Graph Shortcode
* Tabs Shortcode
* Toggle Shortcode
* Icon Shortcode

== Installation ==

1. Upload `mtphr-shortcodes` directory to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

= Where is the documentation =

Documentation is coming soon!

== Screenshots ==

1. Grid column sample.
2. Post blocks sample.
3. Post slider sample.
4. Normal pricing table sample.
5. Condensed pricing table sample.
6. List pricing table sample.

== Changelog ==

= 2.1.4 =
* Added plugin to GitHub 

= 2.1.3 =
* Fixed excerpt output of post blocks

= 2.1.2 =
* Added additional filters to the Metaphor Grid shortcode

= 2.1.1 =
* Moved custom class attribute for the icon shortcode from <i> tag to the outermost wrapper of the icon display
* Added tax_query argument to post slider for multiple taxonomy filters
* Modified excerpt creation for Post Blocks & Post Sliders
* Added class to Post Block & Post Slider excerpts
* Added class to Post Block & Post Slider excerpt more links
* Added filter for the Post Block & Post Slider excerpt more links
* Added custom class filter
* Converted to new icon font
* Added social icons to icon shortcode
* Added "mtphr_icon_display" filter to metaphor icons
* Added "prefix" argument for metaphor icon classes

= 2.1.0 =
* Fixed excerpt more links in post slider & post blocks
* Modified grid shortcode to allow for multiple levels of grid structure. I have added: mtphr_grid, mtphr_grid_2, mtphr_grid_3, mtphr_grid_4, or mtphr_grid_5. You must use a different shortcode for each level in order to render correctly.
* You can now hide the pricing table button by passing "null" as the button attribute
* Added code to make sure the same post block doesn't show up when displaying multiple randomly ordered post blocks
* Set a delay on showing initial tabbed content to render correctly in Firefox

= 2.0.10 =
* Tabs shorcode bug fix
* Updated Italian translation
* Added French translation

= 2.0.9 =
* Fixed post slider issue with small screens
* Adjusted slide graph label to work with longer strings
* Fixed issue with large images not fitting in tabs content
* Fixed post_block ID="undefined" issue with shortcode generator

= 2.0.8 =
* Added taxonomy query args to filter post slider

= 2.0.7 =
* Updated localization text
* Added default .mtphr-post-block class to post blocks
* Modified excerpt functionality

= 2.0.6 =
* Icon CSS adjustments.
* Changed .clearfix class to .mtphr-clearfix
* Changed &plus; to + in the mtphr_toggle shortcode due to IE errors
* Adjusted swipe function in js

= 2.0.5 =
* Adjusted mtphr_toggle expanded/condensed button code & css.
* Added "custom" type to mtphr_slider.
* Added default shortcode arg filters to all shortcodes.
* Added taxonomy args to post_slider and post_block shortcodes.
* Added setting for post_slider scroll speed.
* Added mobile swipe support for post sliders.
* Added shortcode generator.

= 2.0.4 =
* Added new filters to post_slider shortcode.
* Modified jQuery script loading for post_slider.
* Added Slide Graph shortcode.
* Added Tabs shortcode.
* Added Toggle shortcode.
* Fixed typo in post slider code.
* Added it_IT.mo & it_IT.po files.
* Added content wrapper to post slider and modified CSS.

= 2.0.3 =
* Fixed localization script.
* Added setting to set responsive grids.
* Updated metphr-tabs.js file.

= 2.0.2 =
* Added thumb_size argument to post_block shortcode.
* Added thumb_size argument to post_slider shortcode.

= 2.0.1 =
* Added html_entity_decode to excerpt_more attribute to allow for html characters to be passed.

= 2.0.0 =
* Updated version number to force old installs to update.

= 1.0.3 =
* Updated grid row classes & css.
* Added responsive filter.

= 1.0.2 =
* Added respond.js to add media queries for older browsers.

= 1.0.0 =
* Initial upload of Metaphor Shortcodes.

== Upgrade Notice ==

Added plugin to GitHub.