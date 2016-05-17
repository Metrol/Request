<?php
/**
 * @author        "Michael Collette" <metrol@metrol.net>
 * @package       Metrol/Request
 * @version       1.0
 * @copyright (c) 2016, Michael Collette
 */

namespace Metrol\Request;

/**
 * An immutable set of values that the request objects have set prior to any
 * tweaking
 *
 */
final class Values
{
    /**
     * The values for the request object stored as an array
     *
     * @var array
     */
    private $dataArray;

    /**
     * Set the values from the request object.
     *
     * @param array $dataValues
     */
    public function __construct(array $dataValues)
    {
        $this->dataArray = $dataValues;
    }

    /**
     * Provide the value for the specified key.  If that key does not exist, a
     * null is returned instead.
     *
     * @param string $key
     *
     * @return mixed|null
     */
    public function get($key)
    {
        $rtn = null;

        if ( isset($this->dataArray[$key]) )
        {
            $rtn = $this->dataArray[$key];
        }

        return $rtn;
    }

    /**
     * Provide the values in here as an array
     *
     * @return array
     */
    public function getDataArray()
    {
        return $this->dataArray;
    }

    /**
     * Provide the value in here as an object
     *
     * @return \stdClass
     */
    public function getDataObject()
    {
        $obj = new \stdClass;

        foreach ( $this->dataArray as $key => $value )
        {
            $obj->$key = $value;
        }

        return $obj;
    }
}
