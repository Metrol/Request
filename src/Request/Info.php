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
     */
    public function get(string $key): mixed;

    /**
     * Acts like isset, but publicly callable
     *
     */
    public function exists(string $key): bool;

    /**
     * Provide the values for this object as an array
     *
     */
    public function getValuesArray(): array;

    /**
     * Provide the values for this object as an object
     *
     */
    public function getValuesObject(): stdClass;
}
