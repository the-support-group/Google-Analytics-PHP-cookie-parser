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
   *
   * @param mixed[] $cookie A cookie array.
   * 
   * @param GAInterface $ga A GA object.
   */
  public function __construct(
      array $cookie,
      GAInterface $ga
  );


  /**
   * Parse cookies into GA object.
   *
   * @return GAInterface|false A GA object or false on failure.
   */
  public function parseCookies();
}

?>
