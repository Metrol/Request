<?php
/**
 * @author        "Michael Collette" <metrol@metrol.net>
 * @package       Metrol/Request
 * @version       1.0
 * @copyright (c) 2016, Michael Collette
 */

namespace Metrol\Request;

/**
 * Object representing the $_COOKIE super global
 *
 */
class Cookie
{
    use ValuesTrait;

    const SUPER_GLOBAL = '_COOKIE';

    /**
     * Initiates the Cookie object
     *
     */
    public function __construct()
    {
        $this->initRequestData($_COOKIE);
    }
}
