# Google Analytics PHP cookie parser
Forked from package by [João Correia](http://joaocorreia.pt/)

Google Analytics collects data using first-party cookies which are stored on the browser. This class can be used to easily integrate this cookie data into proprietary systems like CRM, ERP, Helpdesks, etc.

* **__utma (expires 2 years after being defined) – visitor data**. This cookie is written on your first visit to the website. In case you erase it its created again. Its used for the Unique Visitors calculation and is updated on every pageview.

* **__utmz (expires 6 months after being defined) – campaign data**. This cookie stores informations on how the user got to our website: referrer, direct (none), organic or a campaign such as a newsletter. (since you tag it correctly using the URL Builder). This cookie is overwritten every time you visit the website.

The Google Analytics Cookie Parser allows you to obtain some data contained in this cookies in a human readable format. For example, you can see how you got here by visiting: http://joaocorreia.pt/example.php.

## How to use this class
The object should be made available using DI and can be used in the following way:

```php
(new GAParse(
    [
        '__utma' => '1.689278735.1463472764.1463483571.1463488513.3',
        '__utmz' => '1.1463473099.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none)'
    ],
    new GA()
))->parseCookies();
```

Will return the following GA object:

```
class TheSupportGroup\Common\GoogleAnalyticsCookieParser\GA#222 (10) {
  protected $campaign_source => string(8) "(direct)"
  protected $campaign_name => string(8) "(direct)"
  protected $campaign_medium => string(6) "(none)"
  protected $campaign_content => string(0) ""
  protected $campaign_term => string(0) ""
  protected $first_visit =>
  class DateTime#221 (3) {
    public $date => string(26) "2016-05-17 09:12:44.000000"
    public $timezone_type => int(3)
    public $timezone => string(13) "Europe/London"
  }
  protected $previous_visit =>
  class DateTime#220 (3) {
    public $date => string(26) "2016-05-17 12:12:51.000000"
    public $timezone_type => int(3)
    public $timezone => string(13) "Europe/London"
  }
  protected $current_visit_started =>
  class DateTime#219 (3) {
    public $date => string(26) "2016-05-17 13:35:13.000000"
    public $timezone_type => int(3)
    public $timezone => string(13) "Europe/London"
  }
  protected $times_visited => string(1) "3"
  protected $pages_viewed => NULL
}
```

## Data available by using this class
* **Campaign source**
* **Campaign name**
* **Campaign medium**
* **Campaign content**
* **Campaign term**
* **Date of first visit**
* **Date of previous visit**
* **Date of current visit**
* **Times visited**
* **Pages viewed**