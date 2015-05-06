<?php

/**
 * Dreamscapes/scalars
 *
 * For full copyright and license information, please see the LICENSE file
 *
 * @author      Robert Rossmann <rr.rossmann@me.com>
 * @copyright   2015 Robert Rossmann
 * @link        https://github.com/Dreamscapes/scalars
 * @license     http://choosealicense.com/licenses/bsd-3-clause   BSD (3-Clause) License
 */

/**
 * A generic class representing any scalar value
 *
 * @package scalars
 * @property-read string $val Value of this scalar
 */
abstract class Scalar
{
    /**
     * The actual value of the scalar object
     * @var mixed
     */
    protected $val;


    /**
     * Perform a type cast of the given value into the type of this class
     *
     * Use this method to convert any scalar value into a particular type, using PHP's built-in
     * mechanism. For example:
     *
     * ```
     * $trueVal = Bool::cast(123);
     * // $trueVal is now (bool)true, because 123 is a truthy value
     * ```
     *
     * **Use this with caution**: PHP can sometimes have unexpected typecasting results, i.e.:
     *
     * ```
     * $myBool = Bool::cast('0'); // Casting non-empty string, but 0 is interpreted as false!
     * ```
     *
     * @param  mixed $val Value to by coerced into specific type
     * @return mixed      Instance of the class the value has been type-cast into
     */
    public static function cast($val)
    {
        // Accessing undefined constant is pretty much the last thing you do...
        if (defined('static::TYPE')) {
            settype($val, static::TYPE);

            // Value is cast - now construct the object
            return new static($val);
        }

        // Unable to cast - freak out!
        $message = sprintf(
            'Cannot cast value of type %s into %s',
            gettype($val),
            get_called_class()
        );

        trigger_error($message, E_USER_ERROR);
    }


    /**
     * Create a new instance
     *
     * @param mixed $val Value of this scalar
     */
    public function __construct($val)
    {
        // If $val is already an instance of one of the object implementations, extract its value
        $this->val = $val instanceof Scalar ? $val->val : $val;

        // Validate...
        if (! is_scalar($this->val)) {
            return $this->panic();
        }
    }

    /**
     * Allow a read-only access to the $val property
     * @param  string $prop Property to be read (only 'val' is considered valid)
     * @return mixed
     */
    public function __get($prop)
    {
        // The only valid value for $prop is 'val' - everything else will trigger a notice
        return $this->$prop;
    }

    /**
     * A convenience method to return the underlying scalar value by invoking the instance
     *
     * Usage:
     *
     * ```
     * $myString = String('tadida'); // $myString is now instance of String class
     * $actualStr = $myString(); // $actualStr is now normal PHP string
     * ```
     *
     * @return mixed
     */
    public function __invoke()
    {
        return $this->val;
    }


    /**
     * Trigger an invalid type error
     *
     * This is used internally when the scalar type given to the class constructor does not match
     * the expected type, i.e.:
     *
     * ```
     * $bool = Bool('true'); // Triggers a PHP error via this method call
     * ```
     *
     * @return void
     */
    protected function panic()
    {
        $message = sprintf(
            'Invalid type supplied for %s, %s given',
            get_class($this),
            gettype($this->val)
        );

        // Type mismatch should not be recoverable as it is a programmer error
        trigger_error($message, E_USER_ERROR);
    }
}
