<?php
/**
 * @description GA - represent a GA (Google Analytics) object.
 * @author Luke Alexander Tarplin, <luke@easyfundraising.org.uk>
 */

namespace TheSupportGroup\Common\GoogleAnalyticsCookieParser;

use DateTimeInterface;

class GA implements GAInterface
{
    /**
     * @var string $campaign_source A campaign source.
     */
    protected $campaign_source;


    /**
     * @var string $campaign_name A campaign name.
     */
    protected $campaign_name;


    /**
     * @var string $campaign_medium A campaign medium.
     */
    protected $campaign_medium;


    /**
     * @var int $random_id A random Id.
     */
    protected $random_id;


    /**
     * @var string $campaign_content A campaign content.
     */
    protected $campaign_content;


    /**
     * @var string $campaign_term A campaign term.
     */
    protected $campaign_term;


    /**
     * @var DateTimeInterface $first_visit Date of first visit.
     */
    protected $first_visit;


    /**
     * @var DateTimeInterface $previous_visit Date of previous visit.
     */
    protected $previous_visit;


    /**
     * @var DateTimeInterface $current_visit_started Current visit started at.
     */
    protected $current_visit_started;


    /**
     * @var string $times_visited Times visited.
     */
    protected $times_visited;


    /**
     * @var string $pages_viewed Pages viewed in current session.
     */
    protected $pages_viewed;


    /**
     * Get campaign source.
     * @return string
     */
    public function getCampaignSource()
    {
        return $this->campaign_source;
    }


    /**
     * Set campaign source.
     * @param string $campaign_source A campaign source.
     * @return self
     */
    public function setCampaignSource($campaign_source)
    {
        $this->campaign_source = $campaign_source;
        return $this;
    }


    /**
     * Get a campaign name.
     * @return string
     */
    public function getCampaignName()
    {
        return $this->campaign_name;
    }


    /**
     * Set a campaign name.
     * @param string $campaign_name A campaign name.
     * @return self
     */
    public function setCampaignName($campaign_name)
    {
        $this->campaign_name = $campaign_name;
        return $this;
    }


    /**
     * Get a campaign medium.
     * @return string
     */
    public function getCampaignMedium()
    {
        return $this->campaign_medium;
    }


    /**
     * Set a campaign medium.
     * @param string $campaign_medium A campaign medium.
     * @return self
     */
    public function setCampaignMedium($campaign_medium)
    {
        $this->campaign_medium = $campaign_medium;
        return $this;
    }


    /**
     * Get a random Id.
     * @return int
     */
    public function getRandomId()
    {
        return $this->random_id;
    }


    /**
     * Set a random Id.
     * @param int $random_id A random Id.
     * @return self
     */
    public function setRandomId($random_id)
    {
        $this->random_id = $random_id;
        return $this;
    }


    /**
     * Get a campaign content.
     * @return string
     */
    public function getCampaignContent()
    {
        return $this->campaign_content;
    }


    /**
     * Set a campaign content.
     * @param string $campaign_content A campaign content.
     * @return self
     */
    public function setCampaignContent($campaign_content)
    {
        $this->campaign_content = $campaign_content;
        return $this;
    }


    /**
     * Get campaign terms.
     * @return string
     */
    public function getCampaignTerm()
    {
        return $this->campaign_term;
    }


    /**
     * Set campaign terms.
     * @param string $campaign_term A campaign terms.
     * @return self
     */
    public function setCampaignTerm($campaign_term)
    {
        $this->campaign_term = $campaign_term;
        return $this;
    }


    /**
     * Get first visit.
     * @return DateTimeInterface
     */
    public function getFirstVisit()
    {
        return $this->first_visit;
    }


    /**
     * Set first visit.
     * @param DateTimeInterface $first_visit First visit.
     * @return self
     */
    public function setFirstVisit(DateTimeInterface $first_visit)
    {
        $this->first_visit = $first_visit;
        return $this;
    }


    /**
     * Get previous visit.
     * @return DateTimeInterface
     */
    public function getPreviousVisit()
    {
        return $this->previous_visit;
    }


    /**
     * Set previous visit.
     * @param DateTimeInterface $previous_visit Previous visit.
     * @return self
     */
    public function setPreviousVisit(DateTimeInterface $previous_visit)
    {
        $this->previous_visit = $previous_visit;
        return $this;
    }


    /**
     * Get current visit started.
     * @return DateTimeInterface
     */
    public function getCurrentVisitStarted()
    {
        return $this->current_visit_started;
    }


    /**
     * Set current visit started.
     * @param DateTimeInterface $current_visit_started Current visit started.
     * @return self
     */
    public function setCurrentVisitStarted(DateTimeInterface $current_visit_started)
    {
        $this->current_visit_started = $current_visit_started;
        return $this;
    }


    /**
     * Get times visited.
     * @return string
     */
    public function getTimesVisited()
    {
        return $this->times_visited;
    }


    /**
     * Set times visited.
     * @param string $times_visited Times visited.
     * @return self
     */
    public function setTimesVisited($times_visited)
    {
        $this->times_visited = $times_visited;
        return $this;
    }


    /**
     * Get pages viewed.
     * @return string
     */
    public function getPagesViewed()
    {
        return $this->pages_viewed;
    }


    /**
     * Set pages viewed.
     * @param string $pages_viewed pages viewed.
     * @return self
     */
    public function setPagesViewed($pages_viewed)
    {
        $this->pages_viewed = $pages_viewed;
        return $this;
    }
}

?>
