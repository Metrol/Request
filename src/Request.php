<?php
/**
 * @author        "Michael Collette" <metrol@metrol.net>
 * @package       Metrol/Request
 * @version       1.0
 * @copyright (c) 2016, Michael Collette
 */

namespace Metrol;

/**
 * Handles an HTTP request and provides the details in the form of objects
 *
 */
class Request
{
    /**
     * Object representing the $_REQUEST super global
     *
     * @var Request\Request
     */
    protected $requestObj = null;

    /**
     * Object representing the $_GET super global
     *
     * @var Request\Get
     */
    protected $getObj = null;

    /**
     * Object representing the $_POST super global
     *
     * @var Request\Post
     */
    protected $postObj = null;

    /**
     * Object representing the $_COOKIE super global
     *
     * @var Request\Cookie
     */
    protected $cookieObj = null;

    /**
     * Object representing the $_FILES super global
     *
     * @var Request\Files
     */
    protected $filesObj = null;

    /**
     * Object representing the $_SERVER super global
     *
     * @var Request\Server
     */
    protected $serverObj = null;

    /**
     * Object representing the $_SESSION super global
     *
     * @var Request\Session
     */
    protected $sessionObj = null;

    /**
     * Object for manually assigned arguments
     *
     * @var Request\Assigned
     */
    protected $assignedObj = null;

    /**
     * Initiates the Request
     *
     */
    public function __construct()
    {
    }

    /**
     * Provide the object handling for the $_REQUEST super globale, providing a
     * combination of the $_GET, $_POST, and $_COOKIE super global values.
     *
     * @return Request\Request
     */
    public function request()
    {
        if ( !is_object($this->requestObj) )
        {
            $this->requestObj = new Request\Request;
        }

        return $this->requestObj;
    }

    /**
     * Provide the object handling for the $_GET super global.
     *
     * @return Request\Get
     */
    public function get()
    {
        if ( !is_object($this->getObj) )
        {
            $this->getObj = new Request\Get;
        }

        return $this->getObj;
    }

    /**
     * Provide the object handling for the $_POST super global.
     *
     * @return Request\Post
     */
    public function post()
    {
        if ( !is_object($this->postObj) )
        {
            $this->postObj = new Request\Post;
        }

        return $this->postObj;
    }

    /**
     * Provide the object handling for the $_FILES super global.
     *
     * @return Request\Files
     */
    public function files()
    {
        if ( !is_object($this->filesObj) )
        {
            $this->filesObj = new Request\Files;
        }

        return $this->filesObj;
    }

    /**
     * Provide the object handling for the $_COOKIE super global.
     *
     * @return Request\Cookie
     */
    public function cookie()
    {
        if ( !is_object($this->cookieObj) )
        {
            $this->cookieObj = new Request\Cookie;
        }

        return $this->cookieObj;
    }

    /**
     * Provide the object handling for the $_SERVER super global.
     *
     * @return Request\Server
     */
    public function server()
    {
        if ( !is_object($this->serverObj) )
        {
            $this->serverObj = new Request\Server;
        }

        return $this->serverObj;
    }

    /**
     * Provide the object handling for the $_SESSION super global.
     *
     * @return Request\Session
     */
    public function session()
    {
        if ( !is_object($this->sessionObj) )
        {
            $this->sessionObj = new Request\Session;
        }

        return $this->sessionObj;
    }

    /**
     * Provide the assigned values object
     *
     * @return Request\Assigned
     */
    public function assigned()
    {
        if ( $this->assignedObj === null )
        {
            $this->assignedObj = new Request\Assigned;
        }

        return $this->assignedObj;
    }
}
