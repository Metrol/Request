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
 * Parent for immutable HTTP request information
 *
 */
abstract class Immutable
{
    /**
     * The key/value array that represents the information from the request
     * type.
     *
     */
    protected array $keyValues = [];

    /**
     * Instantiate the Immutable object
     *
     * @param array $keyValues The list of values to store
     */
    public function __construct(array $keyValues)
    {
        $this->keyValues = $keyValues;
    }

    /**
     * Magical fetch
     *
     */
    public function __get(string $key): mixed
    {
        return $this->get($key);
    }

    /**
     * Magic isset
     *
     */
    public function __isset(string $key): bool
    {
        return isset($this->keyValues[$key]);
    }

    /**
     * Provide the value for the specified key.  If that key does not exist, a
     * null is returned instead.
     *
     */
    public function get(string $key): mixed
    {
        $rtn = null;

        if ( isset($this->keyValues[$key]) )
        {
            $rtn = $this->keyValues[$key];
        }

        return $rtn;
    }

    /**
     * Acts like isset, but publicly callable
     *
     */
    public function exists(string $key): bool
    {
        return $this->__isset($key);
    }

    /**
     * Provide the values for this object as an array
     *
     */
    public function getValuesArray(): array
    {
        return $this->keyValues;
    }

    /**
     * Provide the values for this object as an object
     *
     */
    public function getValuesObject(): stdClass
    {
        $obj = new stdClass;

        foreach ( $this->keyValues as $key => $value )
        {
            $obj->$key = $value;
        }

        return $obj;
    }
}
