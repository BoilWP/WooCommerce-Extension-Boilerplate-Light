# WooCommerce Extension Boilerplate Lite  [![Built with Grunt](https://cdn.gruntjs.com/builtwith.png)](http://gruntjs.com/)

This is a lite boilerplate for creating simple WooCommerce plugin extensions. 

> This is not a boilerplate for WooCommerce Payment Gateways. One has already been provided by WooThemes.

## What is this boilerplate designed for?

The boilerplate is designed for small and simple extensions for WooCommerce. What I have done is set a ready environment that allows you to start developing the ground work of the extension. With the boilerplate you also have actions and filter hooks in place that not only make it easy for you to create extensions but for third-party developers to connect and work with your extensions as well.

## What about support?

If the documentation provided doesn't help you then you can use the [forum topic](http://www.sebastiendumont.com/support/forum/woocommerce-extension-boilerplate/) to ask any questions about the extension boilerplate and either I or the community will respond.

## Contents

The WooCommerce Extension Boilerplate includes the following files:

* This README.md
* CHANGELOG.md
* CONTRIBUTING.md
* FAQ.md
* license.txt file
* `.editorconfig` file.
* `.gitattributes` file.
* `.gitignore` file.
* `.composer.json` file.
* `Gruntfile.js` file.
* `package.json` file
* A subdirectory called `woocommerce-extension-boilerplate-lite` that represents the core plugin file.

## Installation

1. Copy the `woocommerce-extension-boilerplate-lite` directory into your `wp-content/plugins` directory
2. Navigate to the *Plugins* dashboard page
3. Locate 'WooCommerce Extension Boilerplate Lite'
4. Click on *Activate*

> This will activate the WooCommerce Extension Boilerplate Lite and we recommend that you install it on a development site not a live site.

## Recommended Tools

### Localization Tools

The WooCommerce Extension Boilerplate Lite uses a variable to store the text domain used when internationalizing strings throughout the Boilerplate. To take advantage of this method, there are tools that are recommended for providing correct, translatable files:

* [Poedit](http://www.poedit.net/)
* [makepot](http://i18n.svn.wordpress.org/tools/trunk/)
* [i18n](https://github.com/grappler/i18n)
* [grunt-wp-i18n](https://github.com/blazersix/grunt-wp-i18n)

Any of the above tools should provide you with the proper tooling to localize the plugin.

### GitHub Updater

The WooCommerce Extension Boilerplate Lite includes native support for the [GitHub Updater](https://github.com/afragen/github-updater) which allows you to provide updates to your WordPress plugin from GitHub.

This uses a new tag in the plugin header:

>  `* GitHub Plugin URI: https://github.com/<owner>/<repo>`

Here's how to take advantage of this feature:

1. Install the [GitHub Updater](https://github.com/afragen/github-updater)
2. Replace the url of the repository for your plugin
3. Push commits to the master branch
4. Enjoy your plugin being updated in the WordPress dashboard

The current version of the GitHub Updater supports tags/branches - whichever has the highest number.

To specify a branch that you would like to use for updating, just add a `GitHub Branch:` header. GitHub Updater will preferentially use a tag over a branch having the same or lesser version number. If the version number of the specified branch is greater then the update will pull from the branch and not from the tag.

The default state is either `GitHub Branch: master` or nothing at all. They are equivalent.

All that info is in [the project](https://github.com/afragen/github-updater).

## Documentation

> Documentation will be provided via the GitHub wiki pages. -- Coming Soon --

## Support

This repository is not suitable for support. Please don't use the issue tracker for support requests, but for core WooCommerce Extension Boilerplate Lite issues only. Support can take place in the appropriate channel:

* The [public support forum](http://www.sebastiendumont.com/support/forum/woocommerce-extension-boilerplate/) at SebastienDumont.com, where the community can help each other out.

Support requests in issues on this repository will be closed on sight.

## Contributing to WooCommerce Extension Boilerplate Lite

If you have a patch, or stumbled upon an issue with WooCommerce Extension Boilerplate Lite core, you can contribute this back to the code. Please read the [contributor guidelines](https://github.com/seb86/WooCommerce-Extension-Boilerplate-Lite/blob/master/CONTRIBUTING.md) for more information how you can do this.

## License

The WooCommerce Extension Boilerplate Lite is licensed under the GPL v2 or later.

> This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

> This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

> You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

## Important Notes

### Licensing

The WooCommerce Extension Boilerplate Lite is licensed under the GPL v2 or later; however, if you opt to use third-party code that is not compatible with v2, then you may need to switch to using code that is GPL v3 compatible.

For reference, [here's a discussion](http://make.wordpress.org/themes/2013/03/04/licensing-note-apache-and-gpl/) that covers the Apache 2.0 License used by [Bootstrap](http://twitter.github.io/bootstrap/).