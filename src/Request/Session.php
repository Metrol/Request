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
 * Object representing the $_SESSION super global
 *
 */
class Session
{
    /**
     * The session array
     *
     */
    private array $sessionData = [];

    /**
     * Initiates the Session object
     *
     */
    public function __construct()
    {
        if ( isset($_SESSION) )
        {
            $this->sessionData = &$_SESSION;
        }
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
        return isset($this->sessionData[$key]);
    }

    /**
     * Provide the value for the specified key.  If that key does not exist, a
     * null is returned instead.
     *
     */
    public function get(string $key): mixed
    {
        $rtn = null;

        if ( isset($this->sessionData[$key]) )
        {
            $rtn = $this->sessionData[$key];
        }

        return $rtn;
    }

    /**
     * Used to set or alter a value in this object's values.
     *
     */
    public function set(string $key, mixed $value): static
    {
        $this->sessionData[$key] = $value;

        return $this;
    }

    /**
     * Removes a value from the session
     *
     */
    public function delete(string $key): static
    {
        if ( array_key_exists($key, $this->sessionData) )
        {
            unset($this->sessionData[$key]);
        }

        return $this;
    }

    /**
     * Removes all session data
     *
     */
    public function clear(): static
    {
        $this->sessionData = [];

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
     * Provide the values for this object as an array
     *
     */
    public function getValuesArray(): array
    {
        return $this->sessionData;
    }

    /**
     * Provide the values for this object as an object
     *
     */
    public function getValuesObject(): stdClass
    {
        $obj = new stdClass;

        foreach ( $this->sessionData as $key => $value )
        {
            $obj->$key = $value;
        }

        return $obj;
    }
}
