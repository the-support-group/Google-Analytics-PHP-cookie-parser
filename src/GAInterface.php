<?php
/**
 * @description GA Interface - represent a GA (Google Analytics) object.
 * @author Luke Alexander Tarplin, <luke@easyfundraising.org.uk>
 */

namespace TheSupportGroup\Common\GoogleAnalyticsCookieParser;

use DateTimeInterface;

interface GAInterface
{
    /**
     * Get campaign source.
     * @return string
     */
    public function getCampaignSource();


    /**
     * Set campaign source.
     * @param string $campaign_source A campaign source.
     * @return self
     */
    public function setCampaignSource($campaign_source);


    /**
     * Get a campaign name.
     * @return string
     */
    public function getCampaignName();


    /**
     * Set a campaign name.
     * @param string $campaign_name A campaign name.
     * @return self
     */
    public function setCampaignName($campaign_name);


    /**
     * Get a campaign medium.
     * @return string
     */
    public function getCampaignMedium();


    /**
     * Set a campaign medium.
     * @param string $campaign_medium A campaign medium.
     * @return self
     */
    public function setCampaignMedium($campaign_medium);


    /**
     * Get a random Id.
     * @return int
     */
    public function getRandomId();


    /**
     * Set a random Id.
     * @param int $random_id A random Id.
     * @return self
     */
    public function setRandomId($random_id);


    /**
     * Get a campaign content.
     * @return string
     */
    public function getCampaignContent();


    /**
     * Set a campaign content.
     * @param string $campaign_content A campaign content.
     * @return self
     */
    public function setCampaignContent($campaign_content);


    /**
     * Get campaign terms.
     * @return string
     */
    public function getCampaignTerm();


    /**
     * Set campaign terms.
     * @param string $campaign_term A campaign terms.
     * @return self
     */
    public function setCampaignTerm($campaign_term);


    /**
     * Get first visit.
     * @return DateTimeInterface
     */
    public function getFirstVisit();


    /**
     * Set first visit.
     * @param DateTimeInterface $first_visit First visit.
     * @return self
     */
    public function setFirstVisit(DateTimeInterface $first_visit);


    /**
     * Get previous visit.
     * @return DateTimeInterface
     */
    public function getPreviousVisit();


    /**
     * Set previous visit.
     * @param DateTimeInterface $previous_visit Previous visit.
     * @return self
     */
    public function setPreviousVisit(DateTimeInterface $previous_visit);


    /**
     * Get current visit started.
     * @return DateTimeInterface
     */
    public function getCurrentVisitStarted();


    /**
     * Set current visit started.
     * @param DateTimeInterface $current_visit_started Current visit started.
     * @return self
     */
    public function setCurrentVisitStarted(DateTimeInterface $current_visit_started);


    /**
     * Get times visited.
     * @return string
     */
    public function getTimesVisited();


    /**
     * Set times visited.
     * @param string $times_visited Times visited.
     * @return self
     */
    public function setTimesVisited($times_visited);


    /**
     * Get pages viewed.
     * @return string
     */
    public function getPagesViewed();


    /**
     * Set pages viewed.
     * @param string $pages_viewed pages viewed.
     * @return self
     */
    public function setPagesViewed($pages_viewed);
}

?>
