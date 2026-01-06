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
     */
    private array $cookieData;

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
     */
    public function __get(string $key): mixed
    {
        return $this->get($key);
    }

    /**
     * Magical Set
     *
     */
    public function __set(string $key, mixed $value): void
    {
        $this->set($key, $value);
    }

    /**
     * Magic isset
     *
     */
    public function __isset(string $key): bool
    {
        return isset($this->cookieData[$key]);
    }

    /**
     * Provide the value for the specified key.  If that key does not exist, a
     * null is returned instead.
     *
     */
    public function get(string $key): mixed
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
     */
    public function set(string $key, mixed $value): static
    {
        $this->cookieData[$key] = $value;

        return $this;
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
     * Removes a value from the cookie
     *
     */
    public function delete(string $key): static
    {
        if ( array_key_exists($key, $this->cookieData) )
        {
            unset($this->cookieData[$key]);
        }

        return $this;
    }

    /**
     * Provide the values for this object as an array
     *
     */
    public function getValuesArray(): array
    {
        return $this->cookieData;
    }

    /**
     * Provide the values for this object as an object
     *
     */
    public function getValuesObject(): stdClass
    {
        $obj = new stdClass;

        foreach ( $this->cookieData as $key => $value )
        {
            $obj->$key = $value;
        }

        return $obj;
    }
}
