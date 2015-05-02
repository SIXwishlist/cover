#Cover

[![Build Status](https://travis-ci.org/peiche/cover.svg?branch=master)](https://travis-ci.org/peiche/cover)

Cover is a content-driven blogging theme for WordPress. Built on top of Automattic’s _s (Underscores) and bundled with Font Awesome, Cover allows you to focus on your writing. There are no sidebars to mess with, just a single column view of your content.

##Features

Cover is designed for any size screen. No matter the device, Cover always looks beautiful.

Drawing special attention to featured images, from the homepage to posts, category archives to pages, your blog is made uniquely yours. Of course, you don’t _have_ to use images. Cover’s clean typography lets your writing stand on its own.

###Full-width featured images

When you use a featured image in Cover, it displays as a background image behind the title. Images taller than 600 pixels will be displayed full-screen.

###Scalable vector icons

Cover is bundled with Font Awesome v4.3, allowing you to include any of its icons on any post or page.

###Built for Aesop Story Engine

Cover was built from the ground up with ASE in mind. Break out of the content area with full-width components like images, galleries, maps, and more.

###Put widgets in their place

Cover puts your content first, exactly where it should be. But that doesn't mean you can't have widgets and menus, and that's where the overlay comes in.

The overlay is a full-screen menu and widget display. You can define two menus (a regular one and a social media one) and as many widgets as your little heart desires. You can also put a social menu in the footer.

###Social menus

So, about those social menus. All you have to do is create a menu with links to your favorite social media accounts, and Cover will do the rest. It will detect the URL of the site in question and display the appropriate icon*, courtesy of Font Awesome.

*Supported sites:
- CodePen
- Dribbble
- Facebook
- Flickr
- Github
- Google+
- Instagram
- LinkedIn
- Pinterest
- RSS
- Soundcloud
- Tumblr
- Twitter
- Vimeo
- WordPress
- YouTube

If you would like to request support for a site's icon, please raise an issue. Or create a pull request and add it yourself!

###Built with Sass

If you’re a developer and want to play around with Cover, you’ll find that its stylesheet is compressed. This is because I prefer to build the theme’s stylesheet using Sass. To that end, in the project you’ll find the `/sass` folder which holds all the components required to compile the stylesheet, including the bundled Font Awesome styles. (Similarly, the JavaScript used in Cover is compressed, but the uncompressed code is provided in the `/js/src` directory.)

##Installation

###WordPress.org

You can download the latest official release from WordPress.org on your self-hosted site's theme admin page. Follow these steps to activate Cover:

1. In your admin panel, go to Appearance > Themes and click the *Add New* button.
2. Search for "Cover" and, once you've found the theme, click *Install*.
3. Click *Activate* to start using Cover.

###Direct Upload

You can download the latest from Github. Follow these steps to activate Cover:

1. Download the [latest release](https://github.com/peiche/cover/releases/latest).
2. In your admin panel, go to **Appearance > Themes** and click the **Add New** button.
3. Click **Upload** and **Choose File**, then select the theme's zip file. Click **Install Now**.
4. Click **Activate**.

##Building

So you want to build the project yourself. Great! Please follow [these directions](building.md).

##FAQ

1. **How do I set the background image behind the post title?**  
   When you use a featured image in Cover, it displays as a background image behind the title. Images taller than 600 pixels will be displayed full-screen.

2. **Can I change the font size?**  
   Cover does not allow you to change the default font size. I recommend creating a child theme before making changes to the theme.

##Contribute

If you see something wrong, or you want to improve on what I've got here, feel free to submit an issue or create a pull request.

##Changelog

**1.4.0**
- Jetpack's Infinite Scrolling module now detects whether or not the footer social menu is present.
- Update Google Fonts URL to be protocol-relative (thanks to [BforBen](https://github.com/BforBen))
- Added WordPress.org installation directions.

**1.3.1**
- Initial release on the [WordPress.org Theme Directory](https://wordpress.org/themes/cover/).

##License

Cover is [GPL v2.0 or later](LICENSE.txt).

Image used in screenshot.png - https://unsplash.com/photos/1uxV8fAfhVM/download by Luke Chesser  
License - http://creativecommons.org/publicdomain/zero/1.0/  

All other resources are licensed as follows:

* Font Awesome - http://fontawesome.io/license (Font: SIL OFL 1.1, CSS: MIT License)
* Headroom - MIT - https://github.com/WickyNilliams/headroom.js/blob/master/LICENSE  
* Skrollr - MIT - https://github.com/Prinzhorn/skrollr/blob/master/LICENSE.txt  
