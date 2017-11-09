<?php
/**
 * @author        "Michael Collette" <metrol@metrol.net>
 * @package       Metrol/Request
 * @version       1.0
 * @copyright (c) 2016, Michael Collette
 */

namespace Metrol\Request;

/**
 * Object representing manually set arguments
 *
 */
class Args
{
    use ValuesTrait;

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
        $this->initRequestData($this->argValues);
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
