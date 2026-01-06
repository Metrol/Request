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
     */
    protected Request\Request $requestObj;

    /**
     * Object representing the $_GET super global
     *
     */
    protected Request\Get $getObj;

    /**
     * Object representing the $_POST super global
     *
     */
    protected Request\Post $postObj;

    /**
     * Object representing the $_COOKIE super global
     *
     */
    protected Request\Cookie $cookieObj;

    /**
     * Object representing the $_FILES super global
     *
     */
    protected Request\Files $filesObj;

    /**
     * Object representing the $_SERVER super global
     *
     */
    protected Request\Server $serverObj;

    /**
     * Object representing the $_SESSION super global
     *
     */
    protected Request\Session $sessionObj;

    /**
     * Object for manually assigned arguments
     *
     */
    protected Request\Assigned $assignedObj;

    /**
     * Initiates the Request
     *
     */
    public function __construct()
    {
    }

    /**
     * Provide the object handling for the $_REQUEST super globals, providing a
     * combination of the $_GET, $_POST, and $_COOKIE super global values.
     *
     */
    public function request(): Request\Request
    {
        if ( !  isset($this->requestObj) )
        {
            $this->requestObj = new Request\Request;
        }

        return $this->requestObj;
    }

    /**
     * Provide the object handling for the $_GET super global.
     *
     */
    public function get(): Request\Get
    {
        if ( ! isset($this->getObj) )
        {
            $this->getObj = new Request\Get;
        }

        return $this->getObj;
    }

    /**
     * Provide the object handling for the $_POST super global.
     *
     */
    public function post(): Request\Post
    {
        if ( ! isset($this->postObj) )
        {
            $this->postObj = new Request\Post;
        }

        return $this->postObj;
    }

    /**
     * Provide the object handling for the $_FILES super global.
     *
     */
    public function files(): Request\Files
    {
        if ( ! isset($this->filesObj) )
        {
            $this->filesObj = new Request\Files;
        }

        return $this->filesObj;
    }

    /**
     * Provide the object handling for the $_COOKIE super global.
     *
     */
    public function cookie(): Request\Cookie
    {
        if ( ! isset($this->cookieObj) )
        {
            $this->cookieObj = new Request\Cookie;
        }

        return $this->cookieObj;
    }

    /**
     * Provide the object handling for the $_SERVER super global.
     *
     */
    public function server(): Request\Server
    {
        if ( ! isset($this->serverObj) )
        {
            $this->serverObj = new Request\Server;
        }

        return $this->serverObj;
    }

    /**
     * Provide the object handling for the $_SESSION super global.
     *
     */
    public function session(): Request\Session
    {
        if ( ! isset($this->sessionObj) )
        {
            $this->sessionObj = new Request\Session;
        }

        return $this->sessionObj;
    }

    /**
     * Provide the assigned values object
     *
     */
    public function assigned(): Request\Assigned
    {
        if ( ! isset($this->assignedObj) )
        {
            $this->assignedObj = new Request\Assigned;
        }

        return $this->assignedObj;
    }
}
