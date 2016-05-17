<?php
/**
 * @author        "Michael Collette" <metrol@metrol.net>
 * @package       Metrol/Request
 * @version       1.0
 * @copyright (c) 2016, Michael Collette
 */

namespace Metrol\Request;

/**
 * Object representing the $_REQUEST super global
 *
 */
class Request
{
    use ValuesTrait;

    /**
     * Initiates the Request object
     *
     */
    public function __construct()
    {
        $this->initRequestData($_REQUEST);
    }
}
