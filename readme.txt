=== Metaphor Shortcodes ===
Contributors: metaphorcreations
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=FUZKZGAJSBAE6
Tags: shortcodes, column grid, pricing tables, post sliders, post blocks, posts
Requires at least: 3.2
Tested up to: 3.5.1
Stable tag: /trunk/
License: GPL2

Custom pack of shortcodes that includes column grids, pricing tables, post sliders, and post blocks.

== Description ==

#### Grid Shortcode

The grid shortcode creates a responsive column grid to use in your pages or posts.

**Attributes**

* **span** - Set the width of the grid block. Each row of grid block is made up of 12 spans. *Default: 12*.
* **start** - Only accepts "true". This is required only on the frist grid block in each row.
* **end** - Only accepts "true". This is required only on the last grid block in each row.
* **class** - Add custom classes to the grid block.

**Grid Example**

`[grid start="true" span="4"]
Add some content here...
[/grid][grid span="4"]
Add some content here...
[/grid][grid end="true" span="4"]
Add some content here...
[/grid]`

- - -

#### Post Block Shortcode

The post block shortcode allows you to display a title and excerpt of **any post type** anywher on your site.
*There are filters built into the shortcode if you wish to override the display of any post blocks.*

**Basic Attributes**

* **id** - Show a specific post by it's post ID. *If this is set, you do not need to set any other attributes.*
* **excerpt_length** - The length of the post excerpt. This will max out at the set excerpt length of your theme. *Default: 80*.
* **excerpt_more** - The display of the 'more' link of the excerpt. Wrap text in curly brackets to create a permalink to the post. *Default: &hellip*.
* **class** - Add custom classes to the post block.


**Advanced Attributes**

If you want to setup 3 post blocks in a row that display the latest 3 posts (or something similar) you will need to use these.

* **type** - Show a specific post type. *Default: post*.
* **offset** - Set the post offset of the query. To show the first post, use 0; the second post, use 1;  etc... *Default: 0*.
* **orderby** - How the post query should order by. [WP Query Reference](https://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters). *Default: rand*.
* **order** - The order of the query. Use **ASC** or **DESC**. *Default: DESC*.

**Post Block Example**
*Note: This example also uses the grid shortcode.

`[grid span="3" start="true"][post_block type="post" offset="0"][/grid][grid span="3"][post_block type="post" offset="1"][/grid][grid span="3"][post_block type="post" offset="2"][/grid][grid span="3" end="true"][post_block type="post" offset="3"][/grid]`

- - -

#### Post Slider Shortcode

Create a horizontal slider of any post type to show within your content. By default it will display a title and excerpt.

**Attributes**

* **type** - Show a specific post type. *Default: post*.
* **orderby** - How the post query should order by. [WP Query Reference](https://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters). *Default: rand*.
* **order** - The order of the query. Use **ASC** or **DESC**. *Default: DESC*.
* **limit** - Limit the number of posts to show. *Default: -1*.
* **excerpt_length** - The length of the post excerpt. This will max out at the set excerpt length of your theme. *Default: 80*.
* **excerpt_more** - The display of the 'more' link of the excerpt. Wrap text in curly brackets to create a permalink to the post. *Default: &hellip*.
* **title** - Display a title for the slider. *Default: Blog Posts*.
* **prev** - The text of the previous button. *Default: Previous*.
* **next** - The text of the next button. *Default: Next*.
* **class** - Add custom classes to the post block.

**Post Slider Example**

`[post_slider title="Site pages" type="page" order="date"]`

- - -

#### Pricing Table Shortcode

Create pricing tables to display in your content. Pricing tables have built-in grid values, so you do not need to insert these into grid shortcodes.

*Each paragraph between the shortcode brackets will make up the list of items.*

**Attributes**

* **span** - Set the width of the pricing table block. As with the grid shortcode, each row of grid block is made up of 12 spans. *Default: 12*.
* **start** - Only accepts "true". This is required only on the frist pricing table in each row.
* **end** - Only accepts "true". This is required only on the last pricing table in each row.
* **style** - Set the style of the table. Options include: **normal**, **condensed**, **list**. *Default: normal*.
* **title** - The title of the table.
* **title_tag** - Set the html tag to wrap the title in. *Default: h3*.
* **dollar** - The dollar amount of the product. Include the curruncy symbol you wish to use.
* **cents** - The fractional dollar amount, or cents, of the product.
* **per** - The subsription frequency. Ex: 'per month'.
* **button** - The button label. *Default: Sign Up*.
* **link** - Where the button should link to.

**Normal Pricing Table Example**

`[pricing_table span="4" start="true" title="BASIC" dollar="$9" cents="99"]

1 Website

1 Email Address

10GB Bandwidth

10GB Storage Space

24/7 Support Line

[/pricing_table][pricing_table span="4" title="PREMIUM" dollar="$29" cents="99"]

5 Websites

5 Email Addresses

50GB Bandwidth

50GB Storage Space

24/7 Support Line

[/pricing_table][pricing_table span="4" end="true" title="ELITE" dollar="$99" cents="99"]

Unlimited Websites

Unlimited Email

1T Bandwidth

1T Storage Space

24/7 Support Line

[/pricing_table]`

**Condensed Pricing Table Example**

`[pricing_table span="3" start="true" style="condensed" title="BASIC" dollar="$9" cents="99"]

1 Website

1 Email Address

10GB Bandwidth

10GB Storage Space

24/7 Support Line

[/pricing_table][pricing_table span="3" style="condensed" title="PREMIUM" dollar="$29" cents="99"]

5 Websites

5 Email Addresses

50GB Bandwidth

50GB Storage Space

24/7 Support Line

[/pricing_table][pricing_table span="3" style="condensed" title="PRO" dollar="$59" cents="99"]

10 Websites

10 Email Addresses

100GB Bandwidth

100GB Storage Space

24/7 Support Line

[/pricing_table][pricing_table span="3" end="true" style="condensed" title="ELITE" dollar="$99" cents="99"]

Unlimited Websites

Unlimited Email

1T Bandwidth

1T Storage Space

24/7 Support Line

[/pricing_table]`

**List Pricing Table Example**

*Note: Wrap the monetary values in `<strong>` tags (paste into HTML editor), which will align them to the right side.*

`[pricing_table span="4" start="true" style="list"]

1 Website<strong>$9.99</strong>

1 Email Address<strong>$19.99</strong>

10GB Bandwidth<strong>$29.99</strong>

10GB Storage Space<strong>$39.99</strong>

24/7 Support Line<strong>Free</strong>

[/pricing_table][pricing_table span="4" style="list"]

5 Websites<strong>$19.99</strong>

5 Email Addresses<strong>$29.99</strong>

50GB Bandwidth<strong>$39.99</strong>

50GB Storage Space<strong>$49.99</strong>

24/7 Support Line<strong>Free</strong>

[/pricing_table][pricing_table span="4" end="true" style="list"]

10 Websites<strong>$29.99</strong>

10 Email Addresses<strong>$39.99</strong>

100GB Bandwidth<strong>$49.99</strong>

100GB Storage Space<strong>$59.99</strong>

24/7 Support Line<strong>Free</strong>

[/pricing_table]`




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

= 1.0.3 =
* Updated grid row classes & css.
* Added responsive filter.

= 1.0.2 =
* Added respond.js to add media queries for older browsers.

= 1.0.0 =
* Initial upload of Metaphor Shortcodes.

== Upgrade Notice ==

= 1.0.3 =
Updated grid row classes & css. Added responsive filter.

= 1.0.2 =
Added respond.js to add media queries for older browsers.

= 1.0.0 =
Initial upload of Metaphor Shortcodes.

