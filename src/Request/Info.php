<?php
/**
 * @author        Michael Collette <mcollette@meetingevolution.net>
 * @version       1.0
 * @package       Request
 * @copyright (c) 2017, Michael Collette
 */

namespace Metrol\Request;

use stdClass;

/**
 * Define the request objects that are immutable and provide some kind of
 * data about the request.
 *
 */
interface Info
{
    /**
     * Provide the value for the specified key.  If that key does not exist, a
     * null is returned instead.
     *
     * @param string|integer $key
     *
     * @return mixed|null
     */
    public function get($key);

    /**
     * Acts like isset, but publicly callable
     *
     * @param string $key
     *
     * @return boolean
     */
    public function exists($key);

    /**
     * Provide the values for this object as an array
     *
     * @return array
     */
    public function getValuesArray();

    /**
     * Provide the values for this object as an object
     *
     * @return stdClass
     */
    public function getValuesObject();
}
