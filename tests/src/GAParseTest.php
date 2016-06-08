<?php

namespace TheSupportGroup\Common\GoogleAnalyticsCookieParser\Tests;

use PHPUnit_Framework_TestCase;
use TheSupportGroup\Common\GoogleAnalyticsCookieParser\GAParse;
use TheSupportGroup\Common\GoogleAnalyticsCookieParser\GA;

class GAParseTest extends PHPUnit_Framework_TestCase
{

    /**
     * Test that parsing known good (direct) values returns a valid object.
     */
    public function testParseCookiesWorksWithDirectValues()
    {
        $gaObj = (new GAParse(
            [
                '__utma' => '1.689278735.1463472764.1463483571.1463488513.3',
                '__utmz' => '1.1463473099.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none)'
            ],
            new GA()
        ))->parseCookies();

        $this->assertInstanceOf(GA::class, $gaObj);
        $this->assertEquals('(direct)', $gaObj->getCampaignSource());
        $this->assertEquals('(direct)', $gaObj->getCampaignName());
        $this->assertEquals('(none)', $gaObj->getCampaignMedium());
        $this->assertEquals(1, $gaObj->getCampaignNumber());
        $this->assertEquals(689278735, $gaObj->getRandomId());
        $this->assertEquals(1, $gaObj->getSessionId());
        $this->assertEquals(1463472764, $gaObj->getFirstVisit()->getTimestamp());
        $this->assertEquals(1463483571, $gaObj->getPreviousVisit()->getTimestamp());
        $this->assertEquals(1463488513, $gaObj->getCurrentVisitStarted()->getTimestamp());
        $this->assertEquals(3, $gaObj->getTimesVisited());
    }


    /**
     * Test that parsing known good (referral) values returns a valid object.
     */
    public function testParseCookiesWorksWithReferralValues()
    {
        $gaObj = (new GAParse(
            [
                '__utma' => '260803353.1662927487.1463654626.1463654626.1463654626.1',
                '__utmz' => '260803353.1463654626.1.1.utmcsr=bitbucket.org|utmccn=(referral)|utmcmd=referral|utmcct=/easyfundraising/easyfundraising/pull-requests/'
            ],
            new GA()
        ))->parseCookies();

        $this->assertInstanceOf(GA::class, $gaObj);
        $this->assertEquals('bitbucket.org', $gaObj->getCampaignSource());
        $this->assertEquals('(referral)', $gaObj->getCampaignName());
        $this->assertEquals('referral', $gaObj->getCampaignMedium());
        $this->assertEquals(1, $gaObj->getCampaignNumber());
        $this->assertEquals(1662927487, $gaObj->getRandomId());
        $this->assertEquals(1, $gaObj->getSessionId());
        $this->assertEquals('/easyfundraising/easyfundraising/pull-requests/', $gaObj->getCampaignContent());
        $this->assertEquals(1463654626, $gaObj->getFirstVisit()->getTimestamp());
        $this->assertEquals(1463654626, $gaObj->getPreviousVisit()->getTimestamp());
        $this->assertEquals(1463654626, $gaObj->getCurrentVisitStarted()->getTimestamp());
        $this->assertEquals(1, $gaObj->getTimesVisited());
    }


    /**
     * Test that parsing known good (CPC referral) values returns a valid object.
     */
    public function testParseCookiesWorksWithCPCGoogleValues()
    {
        $gaObj = (new GAParse(
            [
                '__utma' => '93514761.1388416008.1463673917.1463673917.1463673917.1',
                '__utmz' => '93514761.1463673917.1.1.utmgclid=CM-Eyp7C5swCFQeVGwoddmcKiw|utmccn=(not%20set)|utmcmd=(not%20set)|utmctr=(not%20provided)'
            ],
            new GA()
        ))->parseCookies();

        $this->assertInstanceOf(GA::class, $gaObj);
        $this->assertEquals('google', $gaObj->getCampaignSource());
        $this->assertEquals('', $gaObj->getCampaignName());
        $this->assertEquals('cpc', $gaObj->getCampaignMedium());
        $this->assertEquals(1, $gaObj->getCampaignNumber());
        $this->assertEquals(1388416008, $gaObj->getRandomId());
        $this->assertEquals(1, $gaObj->getSessionId());
        $this->assertEquals('CM-Eyp7C5swCFQeVGwoddmcKiw', $gaObj->getCampaignContent());
        $this->assertEquals(1463673917, $gaObj->getFirstVisit()->getTimestamp());
        $this->assertEquals(1463673917, $gaObj->getPreviousVisit()->getTimestamp());
        $this->assertEquals(1463673917, $gaObj->getCurrentVisitStarted()->getTimestamp());
        $this->assertEquals(1, $gaObj->getTimesVisited());
    }


    /**
     * Test that parsing an empty cookie array returns false.
     */
    public function testParseCookieHandlesAnEmptyCookie()
    {
        $gaParse = (new GAParse(
            [],
            new GA()
        ))->parseCookies();

        $this->assertFalse($gaParse);
    }


    /**
     * Test that invalid values are handled correctly.
     */
    public function testParseCookieHandlesInvalidValues()
    {
        $gaParse = (new GAParse(
            [
                '__utma' => '.....1',
                '__utmz' => '...'
            ],
            new GA()
        ))->parseCookies();

        $this->assertFalse($gaParse);
    }
}