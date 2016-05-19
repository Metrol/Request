<?php
/**
 * @author        "Michael Collette" <metrol@metrol.net>
 * @package       Metrol/Request
 * @version       1.0
 * @copyright (c) 2016, Michael Collette
 */

namespace Metrol\Request;

/**
 * Object representing the $_SERVER super global
 *
 */
class Server
{
    use ValuesTrait;

    /**
     * Values that will be provided
     *
     * @var array
     */
    private $vals;

    /**
     * Initiates the Server object
     *
     */
    public function __construct()
    {
        $this->initRequestData($_SERVER);
        $this->initValues();
    }

    /**
     * Provide the values we've got in here.
     *
     * @param string $key Key for the value
     *
     * @return mixed
     */
    public function __get($key)
    {
        $rtn = null;

        $key = strtolower($key);

        if ( isset($this->vals[$key]) )
        {
            $rtn = $this->vals[$key];
        }

        return $rtn;
    }

    /**
     * Allow for changes to take place to the values
     *
     * @param string $key
     * @param mixed  $value
     */
    public function __set($key, $value)
    {
        $this->vals[ $key ] = $value;
    }

    /**
     * Initialize the set of values that will be provided from here as read
     * only properties.
     *
     */
    private function initValues()
    {
        $this->vals = array();

        // Non-standard value I put in either the .htaccess or the Apache
        // config to flag for production, beta, or development.
        if ( $this->get('SITE_MODE') !== null )
        {
            $this->vals['sitemode'] = $this->get('SITE_MODE');
        }

        if ( $this->get('HTTP_REFERER') !== null )
        {
            $this->vals['referer']  = $this->get('HTTP_REFERER');
            $this->vals['referrer'] = $this->get('HTTP_REFERER');
        }

        $this->vals['server']    = $this->get('SERVER_NAME');
        $this->vals['host']      = $this->get('HTTP_HOST');
        $this->vals['method']    = $this->get('REQUEST_METHOD');
        $this->vals['docroot']   = $this->get('DOCUMENT_ROOT');

        if ( array_key_exists('HTTP_ACCEPT_LANGUAGE', $_SERVER) )
        {
            $this->vals['language']  = $this->get('HTTP_ACCEPT_LANGUAGE');
        }
        else
        {
            $this->vals['language'] = 'en-US,en;q=0.5';
        }

        $this->vals['encoding']  = $this->get('HTTP_ACCEPT_ENCODING');
        $this->vals['agent']     = $this->get('HTTP_USER_AGENT');
        $this->vals['uri']       = $this->get('REQUEST_URI');

        if ( array_key_exists('REDIRECT_STATUS', $_SERVER) )
        {
            $this->vals['status'] = $this->get('REDIRECT_STATUS');
        }
        else
        {
            $this->vals['status'] = 200;
        }

        $this->vals['pagerequested'] = 'http://'.
            $this->get('HTTP_HOST').
            $this->get('REQUEST_URI');
    }
}
