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
 * Class representing a string
 *
 * @package scalars
 */
final class String extends Scalar
{
    /**
     * Used for typecasting internally
     */
    const TYPE = 'string';


    /**
     * Create a new instance
     *
     * @param string $val Value of this string
     */
    public function __construct($val)
    {
        parent::__construct($val);

        // Validate...
        if (! is_string($this->val)) {
            return $this->panic();
        }
    }

    /**
     * Convenience method to allow this object to be used in any string context
     *
     * @return string Value of this string
     */
    public function __toString()
    {
        return $this->val;
    }
}
