# CiviCRM Facebook Pixel Tracking

Adds sensible Facebook Pixel events to pages in CiviCRM.

Once configured, this extension calls these Facebook Pixel events and parameters
as shown below. I'm interested in making these more configurable, but have not
been able to prioritize that work. Please see _Help and Improvements_ below if
you'd like to sponsor such an improvement.

Facebook Pixels in this extension use Facebook Marketing API version 2.8
(https://developers.facebook.com/docs/marketing-api/facebook-pixel/v2.8)

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

## Help and Improvements

Please help me improve this extension by using the extension issue queue to
report any troubles and to make requests for feature improvements. The issue
queue is here: https://github.com/twomice/com.joineryhq.fbpixel/issues

Issues submitted to the issue queue will be addressed as I have time and
interest. Please contact me at allen@joineryhq.com to request paid support.
