<?php
/**
 * @author        "Michael Collette" <metrol@metrol.net>
 * @package       Metrol/Request
 * @version       1.0
 * @copyright (c) 2016, Michael Collette
 */

namespace Metrol\Request;

/**
 * Object representing the $_SERVER super global
 *
 */
class Server
{
    use ValuesTrait;

    /**
     * Initiates the Server object
     *
     */
    public function __construct()
    {
        $this->initRequestData($_SERVER);
    }
}
