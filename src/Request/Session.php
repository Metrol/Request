<?php
/**
 * @author        "Michael Collette" <metrol@metrol.net>
 * @package       Metrol/Request
 * @version       1.0
 * @copyright (c) 2016, Michael Collette
 */

namespace Metrol\Request;

/**
 * Object representing the $_SESSION super global
 *
 */
class Session
{
    use ValuesTrait;

    /**
     * Initiates the Session object
     *
     */
    public function __construct()
    {
        $this->initRequestData($_SESSION);
    }
}
