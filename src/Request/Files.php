<?php
/**
 * @author        "Michael Collette" <metrol@metrol.net>
 * @package       Metrol/Request
 * @version       1.0
 * @copyright (c) 2016, Michael Collette
 */

namespace Metrol\Request;

/**
 * Object representing the $_FILES super global
 *
 */
class Files extends Immutable implements Info
{
    /**
     * Initiates the Files object
     *
     */
    public function __construct()
    {
        parent::__construct($_FILES);
    }
}
