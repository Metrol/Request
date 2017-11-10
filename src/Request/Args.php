<?php
/**
 * @author        "Michael Collette" <metrol@metrol.net>
 * @package       Metrol/Request
 * @version       1.0
 * @copyright (c) 2016, Michael Collette
 */

namespace Metrol\Request;

use stdClass;

/**
 * Object representing manually set arguments
 *
 */
class Args
{
    /**
     * An array to pass into the init routine
     *
     * @var array
     */
    private $argValues = [];

    /**
     * Initiates the Files object
     *
     */
    public function __construct()
    {

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
     * Magical Set
     *
     * @param string $key
     * @param mixed  $value
     */
    public function __set($key, $value)
    {
        $this->set($key, $value);
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
        return isset($this->argValues[$key]);
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

        if ( isset($this->argValues[$key]) )
        {
            $rtn = $this->argValues[$key];
        }

        return $rtn;
    }

    /**
     * Used to set or alter a value in this object's values.
     *
     * @param string|integer $key
     * @param mixed  $value
     *
     * @return $this
     */
    public function set($key, $value)
    {
        $this->argValues[$key] = $value;

        return $this;
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
        return $this->argValues;
    }

    /**
     * Provide the values for this object as an object
     *
     * @return stdClass
     */
    public function getValuesObject()
    {
        $obj = new stdClass;

        foreach ( $this->argValues as $key => $value )
        {
            $obj->$key = $value;
        }

        return $obj;
    }

    /**
     * Add a set of values to the stack
     *
     * @param array $values
     *
     * @return $this
     */
    public function addValues(array $values)
    {
        foreach ( $values as $key => $value )
        {
            $this->set($key, $value);
        }

        return $this;
    }
}
