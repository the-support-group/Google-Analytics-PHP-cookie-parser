<?php
/**
 * @description GA (Google Analytics) Parse Interface.
 * @author Luke Alexander Tarplin, <luke@easyfundraising.org.uk>
 */

namespace TheSupportGroup\Common\GoogleAnalyticsCookieParser;

interface GAParseInterface
{
  /**
   * GAParseInterface constructor.
   * @param array $cookie A cookie array.
   * @param GAInterface $ga A GA object.
   */
  public function __construct(
      array $cookie,
      GAInterface $ga
  );


  /**
   * Parse cookies.
   * @return void
   */
  public function parseCookies();
}

?>
