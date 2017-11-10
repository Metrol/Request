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
class Request extends Immutable implements Info
{
    /**
     * Initiates the Request object
     *
     */
    public function __construct()
    {
        parent::__construct($_REQUEST);
    }
}
