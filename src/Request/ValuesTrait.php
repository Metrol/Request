<?php
/**
 * @author        "Michael Collette" <metrol@metrol.net>
 * @package       Metrol/Request
 * @version       1.0
 * @copyright (c) 2016, Michael Collette
 */
namespace Metrol\Request;

/**
 * Used to store and retrieve the values for the various kinds of key/value
 * pair request objects.
 *
 */
trait ValuesTrait
{
    /**
     * A reference back to the super global this is for
     *
     * @var string
     */
    private $superGlobal;

    /**
     * The original set of values for the object.  Should neve
     *
     * @var Values
     */
    private $origValues;

    /**
     * The values in use for the object that are not immutable.
     *
     * @var array
     */
    private $values;

    /**
     * Initialize the data for this request object
     *
     * @param array $reqArray
     */
    private function initRequestData(array &$reqArray)
    {
        $this->superGlobal &= $reqArray;
        $this->origValues   = new Values($reqArray);
        $this->values       = $reqArray;
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

        if ( isset($this->values[$key]) )
        {
            $rtn = $this->values[$key];
        }

        return $rtn;
    }

    /**
     * Used to set or alter a value in this object's values.
     *
     * @param string $key
     * @param mixed  $value
     *
     * @return $this
     */
    public function set($key, $value)
    {
        $this->values[$key] = $value;

        return $this;
    }

    /**
     * Writes the values back to the super global they came from.
     *
     * @return $this
     */
    public function save()
    {
        foreach ( $this->values as $key => $value )
        {
            $this->superGlobal[$key] = $value;
        }

        return $this;
    }

    /**
     * Provide the original value for the specified key.  This value is
     * guaranteed not to have been altered since this object was instantiated.
     *
     * If the key does not exist, a null is returned
     *
     * @param string $key
     *
     * @return mixed|null
     */
    public function getOrig($key)
    {
        return $this->origValues->get($key);
    }

    /**
     * Provide the values for this object as an array
     *
     * @return array
     */
    public function getValuesArray()
    {
        return $this->values;
    }

    /**
     * Provide the values for this object as an object
     *
     * @return \stdClass
     */
    public function getValuesObject()
    {
        $obj = new \stdClass;

        foreach ( $this->values as $key => $value )
        {
            $obj->$key = $value;
        }

        return $obj;
    }

    /**
     * Provide the original values that were passed in here that have not been
     * altered in any way.
     *
     * @return array
     */
    public function getOriginalValueArray()
    {
        return $this->origValues->getDataArray();
    }

    /**
     * Provide the original values that were passed in here that have not been
     * altered in any way.
     *
     * @return \stdClass
     */
    public function getOriginalValueObject()
    {
        return $this->origValues->getDataObject();
    }
}
