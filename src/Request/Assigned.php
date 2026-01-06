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
 * Object representing manually set arguments to ride along with the rest of
 * the request.
 *
 */
class Assigned
{
    /**
     * An array to pass into the init routine
     *
     */
    private array $argValues = [];

    /**
     * Instantiates the assigned arguments object
     *
     */
    public function __construct()
    {

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
        return isset($this->argValues[$key]);
    }

    /**
     * Provide the value for the specified key.  If that key does not exist, a
     * null is returned instead.
     *
     */
    public function get(string $key): mixed
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
     */
    public function set(string $key, mixed $value): static
    {
        $this->argValues[$key] = $value;

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
        return $this->argValues;
    }

    /**
     * Provide the values for this object as an object
     *
     */
    public function getValuesObject(): stdClass
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
     */
    public function addValues(array $values): static
    {
        foreach ( $values as $key => $value )
        {
            $this->set($key, $value);
        }

        return $this;
    }
}
