<?php
/**
 * @author        "Michael Collette" <metrol@metrol.net>
 * @package       Metrol/Request
 * @version       1.0
 * @copyright (c) 2016, Michael Collette
 */

namespace Metrol\Request;

/**
 * Object representing the $_POST super global
 *
 */
class Post extends Immutable implements Info
{
    /**
     * Initiates the Post object
     *
     */
    public function __construct()
    {
        parent::__construct($_POST);
    }
}
