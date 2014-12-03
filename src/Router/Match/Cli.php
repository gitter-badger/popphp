<?php
/**
 * Pop PHP Framework (http://www.popphp.org/)
 *
 * @link       https://github.com/popphp/popphp2
 * @category   Pop
 * @package    Pop
 * @author     Nick Sagona, III <dev@nolainteractive.com>
 * @copyright  Copyright (c) 2009-2014 NOLA Interactive, LLC. (http://www.nolainteractive.com)
 * @license    http://www.popphp.org/license     New BSD License
 */

/**
 * @namespace
 */
namespace Pop\Router\Match;

/**
 * Pop router CLI match class
 *
 * @category   Pop
 * @package    Pop
 * @author     Nick Sagona, III <dev@nolainteractive.com>
 * @copyright  Copyright (c) 2009-2014 NOLA Interactive, LLC. (http://www.nolainteractive.com)
 * @license    http://www.popphp.org/license     New BSD License
 * @version    2.0.0a
 */
class Cli extends AbstractMatch
{

    /**
     * Array of arguments
     * @var array
     */
    protected $arguments = [];

    /**
     * Argument string
     * @var string
     */
    protected $argumentString = null;

    /**
     * Constructor
     *
     * Instantiate the CLI match object
     *
     * @return Cli
     */
    public function __construct()
    {
        $this->setArguments();
    }

    /**
     * Set the route arguments
     *
     * @return Cli
     */
    public function setArguments()
    {
        global $argv;

        // Trim the script name out of the arguments array
        array_shift($argv);

        $this->arguments      = $argv;
        $this->argumentString = implode(' ', $argv);

        return $this;
    }

    /**
     * Get the route arguments
     *
     * @return array
     */
    public function getArguments()
    {
        return $this->arguments;
    }

    /**
     * Get the route argument string
     *
     * @return string
     */
    public function getArgumentString()
    {
        return $this->argumentString;
    }

    /**
     * Match the route to the controller class
     *
     * @param  array   $routes
     * @param  boolean $strict
     * @return boolean
     */
    public function match($routes, $strict = false)
    {
        foreach ($routes as $route => $controller) {
            if (substr($this->argumentString, 0, strlen($route)) == $route) {
                if (($strict) && ($this->argumentString == $route)) {
                    $this->controller = $controller['controller'];
                    $this->action     = $controller['action'];
                } else if (!$strict) {
                    $suffix = substr($this->argumentString, strlen($route));
                    if ((($suffix == '') || (substr($suffix, 0, 1) == ' ')) &&
                        (isset($controller['controller']) && isset($controller['action']))) {
                        $this->controller = $controller['controller'];
                        $this->action     = $controller['action'];
                    }
                }
            }
            if (isset($controller['default']) && ($controller['default']) && isset($controller['controller'])) {
                $this->defaultController = $controller['controller'];
            }
        }

        return ((null !== $this->controller) && (null !== $this->action));
    }

}