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
 * @property string $sitemode      What mode the site is in
 * @property string $uri           The portion of the URL following the domain, or page
 * @property string $referer       The referring page coming to this request
 * @property string $server        The name of the web server
 * @property string $host          The host name of the server in the request
 * @property string $method        Which HTTP method was used (GET, POST, HEAD, PUT)
 * @property string $docroot       The document root of the site
 * @property string $language      The language requested in the HTML
 * @property string $encoding      What kind of encoding was requested
 * @property string $pagerequested The fully formed URL of the request
 */
class Server extends Immutable implements Info
{

    /**
     * Values that will be provided
     *
     */
    private array $vals;

    /**
     * Initiates the Server object
     *
     */
    public function __construct()
    {
        parent::__construct($_SERVER);
        $this->initValues();
    }

    /**
     * Extend the parent to account for locally created values
     *
     */
    public function __isset(string $key): bool
    {
        $rtn = parent::__isset($key);

        if ( $rtn === false )
        {
            $rtn = isset($this->vals[$key]);
        }

        return $rtn;
    }

    /**
     * Extend the parent to also look for locally stored values
     *
     */
    public function get(string $key): mixed
    {
        $rtn = parent::get($key);

        // When the parent class doesn't find something, check the local vals
        if ( $rtn === null )
        {
            $key = strtolower($key);

            if ( array_key_exists($key, $this->vals) )
            {
                $rtn = $this->vals[$key];
            }
        }

        return $rtn;
    }

    /**
     * Initialize the set of values that will be provided from here as read
     * only properties.
     *
     */
    private function initValues(): void
    {
        $this->vals = [];

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

        $this->vals['pagerequested'] = 'https://'.
            $this->get('HTTP_HOST').
            $this->get('REQUEST_URI');
    }
}
