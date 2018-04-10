=== YITH WooCommerce Stripe ===

Contributors: yithemes
Tags: stripe, simple stripe checkout, stripe checkout, credit cards, online payment, payment, payments, recurring billing, subscribe, subscriptions, bitcoin, gateway, yithemes, woocommerce, shop, ecommerce, e-commerce
Requires at least: 4.2
Tested up to: 4.4.2
Stable tag: 1.2.7
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Changelog ==

= 1.2.7 - Released on Mar 29, 2016 =

* Tweak: hash on plan name, on avoid subscription configuration no product (like changing price, interval, trial period, etc..)
* Fixed: improved webhooks on payment succedeed
* Fixed: credit card form isn't shown if selected "New card" on checkout page
* Fixed: fatal error with Stripe\Error\API
* Fixed: wrong cart total on hosted checkout
* Fixed: internal server error if the import is lower then .50 cent
* Fixed: a refund from website is marked double, dued an error from webhook
* Fixed: can't create blacklist table and feature not working
* Fixed: total without tax in plan amount

= 1.2.6 - Released on Feb 16, 2016 =

* Added: ability to add new credit card by my account
* Fixed: localization for "Stripe checkout"

= 1.2.5 - Released on Feb 16, 2016 =

* Added: "Stripe checkout" mode directly on checkout page, without button on second page.
* Added: 'order_email' parameter in metadata of Stripe charge
* Added: order note when there is an error during the payment (card declined or card validation by stripe)
* Fixed: stripe library loading causing fatal error in some servers
* Fixed: ccv2 help box not opening on checkout
* Fixed: validation of extra billing fields below credit card form 
* Fixed: bitcoin option didn't work
* Fixed: better response for webhooks, because they remains in pending in some cases

= 1.2.4 - Released on Jan 19, 2016 =

* Added: compatibility with WooCommerce 2.5
* Added: compatibility with YITH WooCommerce Subscriptions and YITH WooCommerce Membership, so now ability to open and manage new subscriptions with Stripe (available only for "Standard" mode of checkout)
* Added: language support for "Stripe checkout" mode
* Added: ability to show extra address fields below credit card info, if you are using any plugin that change fields on checkout, to reduce fraudolent payment risk
* Updated: Stripe API library with latest version

= 1.2.3 - Released on Dec 14, 2015 =

* Fixed: no errors for wrong cards during checkout

= 1.2.2 - Released on Dec 10, 2015 =

* Added: compatibility to multi currency plugin
* Added: compatibility with one-click checkout
* Fixed: bug on refunds for orders not captured yet
* Fixed: localization of CVV suggestion text
* Fixed: bitcoin receivers errors on logs

= 1.2.1 - Released on Aug 19, 2015 =

* Fixed: Minor bug

= 1.2.0 - Released on Aug 12, 2015 =

* Added: Support to WooCommerce 2.4
* Updated: Plugin core framework
* Updated: Language pot file

= 1.1.4 - Released on Jul 24, 2015 =

* Fixed: blacklist table not created on database
* Fixed: blacklist table on admin without pagination

= 1.1.3 - Released on Jul 21, 2015 =

* Added: ability to ban automatically the users with errors during the payment and ability to manage them in a blacklist page

= 1.1.2 - Released on Jun 09, 2015 =

* Fixed: localization of cvv help popup content

= 1.1.1 - Released on Apr 24, 2015 =

* Fixed: creation on-hold orders and flushing checkout session after card error on checkout

= 1.1.0 - Released: Apr 22, 2015 =

* Added: support to WordPress 4.2
* Added: CVV Card Security Code suggestion
* Fixed: bug on checkout

= 1.0.4 - Released: Apr 21, 2015 =

* Added: languages pot catalog

= 1.0.3 - Released: Apr 15, 2015 =

* Added: Name on Card field on Credit Card form of checkout
* Fixed: bug with customer profile creating during purchase

= 1.0.2 - Released: Mar 04, 2015 =

* Updated: Plugin core framework

= 1.0.1 - Released: Mar 03, 2015 =

* Fixed: minor bugs

= 1.0.0 =

* Initial release