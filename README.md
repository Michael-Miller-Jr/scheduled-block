# Scheduled Block Plugin
[Scheduled Block on WordPress.org](https://wordpress.org/plugins/scheduled-block/)

Tired of editing WordPress pages and posts to remove outdated content? If you want to set it and forget it, try my new plugin - **Scheduled Block**! It provides a container-style block where you can place as many blocks as you need within, then set start and end times for automatic display and removal of content. No more manual updates, no more needing to remember when to log back in and remove specific content - once you've set the schedule, your content manages itself 😉.

## Useful Ways to Use the Scheduled Block Plugin

✨ **Promotional Content**: Set start and end times for limited-time offers, product promotions, or discounts to appear and disappear automatically.  
📅 **Event Listings**: Automatically display upcoming events and hide them after the event is over, ensuring your website stays up-to-date without manual changes.  
🎄 **Seasonal Content**: Display special holiday content, such as holiday sales or seasonal promotions, which will automatically expire after the event or season is over.  
📢 **Special Announcements**: Automatically display announcements like store hours during holidays, new product launches, or important updates for a specified duration.  
⏳ **Countdown Timers**: Add countdown blocks for time-sensitive offers or events, automatically hiding the timer once the deadline has passed.  
🚫 **Expired Content**: Automatically remove or hide outdated blog post content, article content, or landing page content without needing to manually go through and delete the blocks at a later time.  
💥 **Time-Sensitive Offers**: For flash sales, set up a block that will only show the content during the promotion period.  
🔒 **Membership Content**: Automatically display or hide membership-related content, such as exclusive offers for members, based on membership duration.  
🛠️ **Custom Widgets**: Automatically show widgets or special content based on time-based promotions, such as time-sensitive feedback forms, surveys, or new sign-up bonuses.  
📣 **Campaign Content**: Schedule the release of marketing campaign content, ensuring that each part of the campaign is shown to visitors only when appropriate.  
🔧 **Temporary Banners**: Create banner notifications for events like site maintenance, product recalls, or temporary changes, and remove them after the relevant period.  
⚡ **Flash Deals**: Set up a flash deal block that only displays for a certain period during a sale, like a one-day discount or a weekend-only special.  
💬 **Limited-Time Testimonials**: Showcase customer testimonials or case studies relevant to a particular promotion or event, and have them disappear once the promotion ends.  
🎁 **Time-Limited Giveaways**: Display giveaways or contests with a clear start and end time, automatically hiding the content once the contest or giveaway period ends.

By using **Scheduled Block**, you can automate a lot of your content management, ensuring your site always has the most relevant content at the right time.

## Additional Information
Control the visibility of content with start/end scheduling for Gutenberg blocks. Perfect for time-sensitive promotions, events, or temporary content.

## Description
The **Scheduled Block** plugin lets you easily manage time-sensitive content in WordPress. Simply wrap any Gutenberg blocks in a Scheduled Block container and set specific display times. Your content will automatically appear and disappear based on your schedule.

### Key Features:
- Visual date/time picker interface
- UTC timezone conversion for reliability
- Caching prevention for accurate scheduling
- Works with any inner blocks/content
- Lightweight and performance-optimized

## Installation
1. Upload the `scheduled-block` folder to your `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Add a "Scheduled Block" to any post/page
4. Set your start/end times in the block settings
5. Add content inside the block

## Screenshots
1. Scheduling interface showing date/time pickers and content area:  
![Screenshot-2025-02-03-191423](https://github.com/user-attachments/assets/5f300567-7d94-4e68-8a51-b2dae99d4c20)

## Frequently Asked Questions

### How does timezone handling work?
All times are converted to UTC for comparison, using your WordPress general settings timezone for input conversion.

### Why isn't my block appearing/disappearing immediately?
Ensure your hosting doesn't have server-level caching. The plugin includes caching prevention headers for WordPress-level caching.

### Can I use multiple scheduled blocks on one page?
Yes! Each block operates independently with its own schedule.

### What date format is used?
The plugin uses ISO 8601 format (YYYY-MM-DDTHH:MM:SS) internally while displaying times in your local WordPress timezone.

