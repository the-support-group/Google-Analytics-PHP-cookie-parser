<?php
/**
 * @description GA Parse - parse a cookie into a GA (Google Analytics) object.
 *  Forked from github.com package joaolcorreia/Google-Analytics-PHP-cookie-parser
 * @author Luke Alexander Tarplin, <luke@easyfundraising.org.uk>
 */

namespace TheSupportGroup\Common\GoogleAnalyticsCookieParser;

use DateTime;

class GAParse implements GAParseInterface
{
    /**
     * @var array $cookie A cookie.
     */
    protected $cookie = [];


    /**
     * @var GAInterface $ga A GA object.
     */
    protected $ga;


    /**
     * GAParseInterface constructor.
     * @param array $cookie A cookie array.
     * @param GAInterface $ga A GA object.
     */
    public function __construct(
        array $cookie,
        GAInterface $ga
    ) {
        $this->cookie = $cookie;
        $this->ga = $ga;
    }


    /**
     * Parse cookies into GA object.
     *
     * @return GAInterface|false A GA object or false on failure.
     */
    public function parseCookies()
    {
        $cookie = $this->cookie;
        $gaObject = $this->ga;

        // Ensure we have __utma & __umtz fields in the cookie.
        if ( ! array_key_exists('__utma', $cookie) ||
             ! array_key_exists('__utmz', $cookie)
        ) {
            return false;
        }

        // Split the utmz data into an array.
        $utmzData =  preg_split('[\.]', $cookie["__utmz"], 5);

        // If utmz data array contains incorrect number of keys return false.
        if (count($utmzData) !== 5) {
            return false;
        }

        $campaign_data = $utmzData[4];

        // Setup defaults.
        $utmcsr = '';
        $utmccn = '';
        $utmcmd = '';
        $utmctr = '';
        $utmcct = '';

        // Parse the campaign data.
        parse_str(
            str_replace('|', '&',
                $campaign_data
            )
        );

        // Add the campaign variables.
        $gaObject->setCampaignSource($utmcsr)
            ->setCampaignName($utmccn)
            ->setCampaignMedium($utmcmd)
            ->setCampaignTerm($utmctr)
            ->setCampaignContent($utmcct);

        // You should tag you campaigns manually to have a full view
        // of your adwords campaigns data.
        // The same happens with Urchin, tag manually to have your campaign data parsed properly.
        if (isset($utmgclid)) {
            $gaObject->setCampaignSource('google')
                ->setCampaignName('')
                ->setCampaignMedium('cpc')
                ->setCampaignTerm($utmctr)
                ->setCampaignContent('');
        }

        // Split the utma data into an array.
        $utmaData = preg_split('[\.]', $cookie["__utma"]);

        // Parse the __utma cookie.
        list(, , $time_initial_visit, $time_beginning_previous_visit, $time_beginning_current_visit, $session_counter) = $utmaData;

        $gaObject->setFirstVisit((new DateTime())->setTimestamp($time_initial_visit));
        $gaObject->setPreviousVisit((new DateTime())->setTimestamp($time_beginning_previous_visit));
        $gaObject->setCurrentVisitStarted((new DateTime())->setTimestamp($time_beginning_current_visit));
        $gaObject->setTimesVisited($session_counter);

        return $gaObject;
    }
}

?>