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
 * Object representing the $_COOKIE super global
 *
 */
class Cookie
{
    /**
     * The cookie data
     *
     * @var array
     */
    private $cookieData;

    /**
     * Initiates the Cookie object
     *
     */
    public function __construct()
    {
        $this->cookieData = &$_COOKIE;
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
        return isset($this->cookieData[$key]);
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

        if ( isset($this->cookieData[$key]) )
        {
            $rtn = $this->cookieData[$key];
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
        $this->cookieData[$key] = $value;

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
        return $this->cookieData;
    }

    /**
     * Provide the values for this object as an object
     *
     * @return stdClass
     */
    public function getValuesObject()
    {
        $obj = new stdClass;

        foreach ( $this->cookieData as $key => $value )
        {
            $obj->$key = $value;
        }

        return $obj;
    }
}
