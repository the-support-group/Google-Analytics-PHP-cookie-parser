<?php

namespace TheSupportGroup\Common\GoogleAnalyticsCookieParser\Tests;

use DateTime;
use PHPUnit_Framework_TestCase;
use TheSupportGroup\Common\GoogleAnalyticsCookieParser\GA;
use TheSupportGroup\Common\GoogleAnalyticsCookieParser\GAInterface;

class GATest extends PHPUnit_Framework_TestCase
{
    /**
     * @var GAInterface $ga A GA object.
     */
    protected $ga;


    /**
     * Setup the GA object before running the tests.
     */
    protected function setUp()
    {
        $date = new DateTime('2016-05-01 00:00:00');

        $this->ga = (new GA())
            ->setCampaignContent('(direct)')
            ->setCampaignMedium('(direct)')
            ->setCampaignName('none')
            ->setCampaignSource('(direct)')
            ->setCampaignTerm('travel-2015')
            ->setCurrentVisitStarted($date)
            ->setFirstVisit($date)
            ->setPreviousVisit($date)
            ->setPagesViewed(3)
            ->setTimesVisited(1);
    }

    /**
     * Test that parsing good values returns a valid object.
     */
    public function testConstructor()
    {
        $this->assertInstanceOf(GA::class, new GA());
    }

    
    public function testGetCampaignSource()
    {
        $this->assertEquals('(direct)', $this->ga->getCampaignSource());
    }


    public function testSetCampaignSource()
    {
        $this->ga->setCampaignSource('/easyfundraising/easyfundraising/pull-requests');
        $this->assertEquals('/easyfundraising/easyfundraising/pull-requests', $this->ga->getCampaignSource());
    }


    public function testGetCampaignName()
    {
        $this->assertEquals('none', $this->ga->getCampaignName());
    }


    public function testSetCampaignName()
    {
        $this->ga->setCampaignName('TATW');
        $this->assertEquals('TATW', $this->ga->getCampaignName());
    }


    public function testGetCampaignMedium()
    {
        $this->assertEquals('(direct)', $this->ga->getCampaignMedium());
    }


    public function testSetCampaignMedium()
    {
        $this->ga->setCampaignMedium('(referral)');
        $this->assertEquals('(referral)', $this->ga->getCampaignMedium());
    }


    public function testGetCampaignContent()
    {
        $this->assertEquals('(direct)', $this->ga->getCampaignContent());
    }


    public function testSetCampaignContent()
    {
        $this->ga->setCampaignContent('(referral)');
        $this->assertEquals('(referral)', $this->ga->getCampaignContent());
    }


    public function testGetCampaignTerm()
    {
        $this->assertEquals('travel-2015', $this->ga->getCampaignTerm());
    }


    public function testSetCampaignTerm()
    {
        $this->ga->setCampaignTerm('travel-2016');
        $this->assertEquals('travel-2016', $this->ga->getCampaignTerm());
    }


    public function testGetFirstVisit()
    {
        $this->assertEquals(1462057200, $this->ga->getFirstVisit()->getTimestamp());
    }


    public function testSetFirstVisit()
    {
        $date = new DateTime();
        $this->ga->setFirstVisit($date);
        $this->assertEquals($date->getTimestamp(), $this->ga->getFirstVisit()->getTimestamp());
    }


    public function testGetPreviousVisit()
    {
        $this->assertEquals(1462057200, $this->ga->getPreviousVisit()->getTimestamp());
    }


    public function testSetPreviousVisit()
    {
        $date = new DateTime();
        $this->ga->setPreviousVisit($date);
        $this->assertEquals($date->getTimestamp(), $this->ga->getPreviousVisit()->getTimestamp());
    }


    public function testGetCurrentVisitStarted()
    {
        $this->assertEquals(1462057200, $this->ga->getCurrentVisitStarted()->getTimestamp());
    }


    public function testSetCurrentVisitStarted()
    {
        $date = new DateTime();
        $this->ga->setCurrentVisitStarted($date);
        $this->assertEquals($date->getTimestamp(), $this->ga->getCurrentVisitStarted()->getTimestamp());
    }


    public function testGetTimesVisited()
    {
        $this->assertEquals(1, $this->ga->getTimesVisited());
    }


    public function testSetTimesVisited()
    {
        $this->ga->setTimesVisited(2);
        $this->assertEquals(2, $this->ga->getTimesVisited());
    }


    public function testGetPagesViewed()
    {
        $this->assertEquals(3, $this->ga->getPagesViewed());
    }


    public function testSetPagesViewed()
    {
        $this->ga->setPagesViewed(4);
        $this->assertEquals(4, $this->ga->getPagesViewed());
    }
}