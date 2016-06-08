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
     *
     * @param mixed[] $cookie A cookie array.
     *
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

        list(, , $session_number, $campaign_number, $campaign_data) = $utmzData;

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

        // Add the session/campaign variables.
        $gaObject->setSessionId($session_number)
            ->setCampaignSource($utmcsr)
            ->setCampaignName($utmccn)
            ->setCampaignMedium($utmcmd)
            ->setCampaignNumber($campaign_number)
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
                ->setCampaignContent($utmgclid);
        }

        // Split the utma data into an array.
        $utmaData = preg_split('[\.]', $cookie["__utma"]);

        // Parse the __utma cookie.
        list(, $random_id, $time_initial_visit, $time_start_previous_visit, $time_start_current_visit, $session_counter) = $utmaData;

        $gaObject->setRandomId($random_id)
            ->setFirstVisit((new DateTime())->setTimestamp($time_initial_visit))
            ->setPreviousVisit((new DateTime())->setTimestamp($time_start_previous_visit))
            ->setCurrentVisitStarted((new DateTime())->setTimestamp($time_start_current_visit))
            ->setTimesVisited($session_counter);

        return $gaObject;
    }
}

?>
