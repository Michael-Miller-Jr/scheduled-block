=== Scheduled Block ===
Contributors: thelastsuperman
Donate link: https://www.paypal.com/paypalme/tiktokfundsme
Tags: scheduling, time-sensitive content, gutenberg blocks, content visibility
Requires at least: 5.8
Tested up to: 6.7
Stable tag: 1.0.8
License: GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html

Control the visibility of content with start/end scheduling for Gutenberg blocks. Perfect for time-sensitive promotions, events, or temporary content.

== Description ==
The Scheduled Block plugin lets you easily manage time-sensitive content in WordPress. Simply wrap any Gutenberg blocks in a Scheduled Block container and set specific display times. Your content will automatically appear and disappear based on your schedule.

Key features:
- Visual date/time picker interface
- UTC timezone conversion for reliability
- Caching prevention for accurate scheduling
- Works with any inner blocks/content
- Lightweight and performance-optimized

== Installation ==
1. Upload the `scheduled-block` folder to your `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Add a "Scheduled Block" to any post/page
4. Set your start/end times in the block settings
5. Add content inside the block

== Screenshots ==
1. Screenshot-2025-02-03-191423.png - Scheduling interface showing date/time pickers and content area

== Frequently Asked Questions ==
= How does timezone handling work? =
All times are converted to UTC for comparison, using your WordPress general settings timezone for input conversion.

= Why isn't my block appearing/disappearing immediately? =
Ensure your hosting doesn't have server-level caching. The plugin includes caching prevention headers for WordPress-level caching.

= Can I use multiple scheduled blocks on one page? =
Yes! Each block operates independently with its own schedule.

= What date format is used? =
The plugin uses ISO 8601 format (YYYY-MM-DDTHH:MM:SS) internally while displaying times in your local WordPress timezone.

== Changelog ==
= 1.0.8 =
* Tested up to version corrected for WordPress i.e. 6.7
* Used a unique prefix to avoid collisions, e.g. "schebl_"

= 1.0.7 =
* Proper escaping using wp_kses_post 

= 1.0.6 =
* Fixed timezone conversion issues
* Improved caching prevention
* Added proper script registration parameters

= 1.0.5 =
* Enhanced UTC time comparisons
* Added server-side rendering optimizations
* UI layout improvements

= 1.0.0 =
* Initial release with core scheduling functionality

== Upgrade Notice ==
1.0.6 - Critical update for proper timezone handling and WordPress coding standards compliance

== License ==
This program is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.