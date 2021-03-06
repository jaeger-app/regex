<?php
/**
 * Jaeger
 *
 * @copyright	Copyright (c) 2015-2016, mithra62
 * @link		http://jaeger-app.com
 * @version		1.0
 * @filesource 	./Regex.php
 */
namespace JaegerApp;

use RegexGuard\RegexGuard;

/**
 * Jaeger - Regex Object
 *
 * Regular Expression execution and validation object
 *
 * @package Regex
 * @author Eric Lamb <eric@mithra62.com>
 */
class Regex
{

    /**
     * The Regex library we're using
     * 
     * @var \RegexGuard\RegexGuard
     */
    private $instance = null;

    /**
     * Returns an instance of the library
     * 
     * @return \RegexGuard\RegexGuard
     */
    private function getInstance()
    {
        if (is_null($this->instance)) {
            $this->instance = \RegexGuard\Factory::getGuard();
        }
        
        return $this->instance;
    }

    /**
     * Validates a given regular expression
     * 
     * @param string $regexp
     *            The regular expression to validate
     * @return boolean
     */
    public function validate($regexp)
    {
        return $this->getInstance()->isRegexValid($regexp);
    }

    /**
     * Matches a regular expression
     * 
     * @param string $pattern
     *            The regular expression to execute
     * @param string $subject
     *            The string to search within
     * @return boolean
     */
    public function match($pattern, $subject)
    {
        if (! $this->validate($pattern)) {
            return false;
        }
        
        return $this->getInstance()->match($pattern, $subject);
    }
}