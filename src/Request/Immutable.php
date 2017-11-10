<?php
/**
 * @author        Michael Collette <mcollette@meetingevolution.net>
 * @version       1.0
 * @package       Request
 * @copyright (c) 2017, Michael Collette
 */

namespace Metrol\Request;

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
     * @var array
     */
    protected $keyValues = [];

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
     * @param string $key
     *
     * @return mixed|null
     */
    public function __get($key)
    {
        return $this->get($key);
    }

    /**
     * Magic isset
     *
     * @param string $key
     *
     * @return boolean
     */
    public function __isset($key)
    {
        return isset($this->keyValues[$key]);
    }

    /**
     * Provide the value for the specified key.  If that key does not exist, a
     * null is returned instead.
     *
     * @param string|integer $key
     *
     * @return mixed|null
     */
    public function get($key)
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
     * @param string $key
     *
     * @return boolean
     */
    public function exists($key)
    {
        return $this->__isset($key);
    }

    /**
     * Provide the values for this object as an array
     *
     * @return array
     */
    public function getValuesArray()
    {
        return $this->keyValues;
    }

    /**
     * Provide the values for this object as an object
     *
     * @return \stdClass
     */
    public function getValuesObject()
    {
        $obj = new \stdClass;

        foreach ( $this->keyValues as $key => $value )
        {
            $obj->$key = $value;
        }

        return $obj;
    }
}
