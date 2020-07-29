# CiviCRM Facebook Pixel Tracking

Adds sensible Facebook Pixel events to pages in CiviCRM.

Once configured, this extension calls these Facebook Pixel events and parameters
as shown below. I'm interested in making these more configurable, but have not
been able to prioritize that work. Please see _Help and Improvements_ below if
you'd like to sponsor such an improvement.

Facebook Pixels in this extension use Facebook Marketing API version 2.8
(https://developers.facebook.com/docs/marketing-api/facebook-pixel/v2.8)

## Configuration
After installing the extension, navigate to Administer > System Settings >
Facebook Pixel Tracking. There you'll be able to enter your Facebook Pixel ID.
Other than this, there are no configuration options to set.

## Facebook Pixel Events

### CiviCRM Events
* **Event Info page:**
    * _ViewContent_
      * content_name: "event-N" (where N is the event ID)
      * content_type: "event",
      * content_ids: "N" (where N is the event ID)

* **Event Registration form:**
	* _AddToCart_
      * content_name: "event-N" (where N is the event ID)
      * content_type: "event",
      * content_ids: "N" (where N is the event ID)
      * value: [total event fees]
      * currency: [event currency, e.g., USD, AUD]
      * num_items: 1 (this is always the integer 1)

* **Event Registration, Confirmation page:**
	* _InitiateCheckout_
      * content_name: "event-N" (where N is the event ID)
      * content_category: "event",
      * content_ids: "N" (where N is the event ID)
      * value: [total event fees]
      * currency: [event currency, e.g., USD, AUD]
      * num_items: 1 (this is always the integer 1)

* **Event Registration, Thank You page:**
	* _CompleteRegistration_
      * content_name: "event-N" (where N is the event ID)
      * value: [total event fees]
      * currency: [event currency, e.g., USD, AUD]
	* _Purchase_
      * content_name: "event-N" (where N is the event ID)
      * content_type: "event",
      * content_ids: "N" (where N is the event ID)
      * value: [total event fees]
      * currency: [event currency, e.g., USD, AUD]
      * num_items: 1 (this is always the integer 1)

### CiviCRM Contributions
* **Contribution, main page:**
	* _ViewContent_
      * content_name: "contribution-N" (where N is the contribution ID)
      * content_type: "contribution",
      * content_ids: "N" (where N is the contribution ID)

* **Contribution, confirmation page:**
	* _InitiateCheckout_
      * content_name: "contribution-N" (where N is the contribution ID)
      * content_category: "contribution",
      * content_ids: "N" (where N is the contribution ID)
      * value: [total contribution amount]
      * currency: [contribution currency, e.g., USD, AUD]
      * num_items: 1 (this is always the integer 1)

* **Event Registration, Thank You page:**
	* _Purchase_
      * content_name: "contribution-N" (where N is the contribution ID)
      * content_type: "contribution",
      * content_ids: "N" (where N is the contribution ID)
      * value: [total contribution amount]
      * currency: [contribution currency, e.g., USD, AUD]
      * num_items: 1 (this is always the integer 1)

## Support
![screenshot](/images/joinery-logo.png)

Joinery provides services for CiviCRM including custom extension development, training, data migrations, and more. We aim to keep this extension in good working order, and will do our best to respond appropriately to issues reported on its [github issue queue](https://github.com/twomice/com.joineryhq.fbpixel/issues). In addition, if you require urgent or highly customized improvements to this extension, we may suggest conducting a fee-based project under our standard commercial terms.  In any case, the place to start is the [github issue queue](https://github.com/twomice/com.joineryhq.fbpixel/issues) -- let us hear what you need and we'll be glad to help however we can.

And, if you need help with any other aspect of CiviCRM -- from hosting to custom development to strategic consultation and more -- please contact us directly via https://joineryhq.com
