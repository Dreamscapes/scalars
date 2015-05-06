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
 * Class representing a floating point number
 *
 * @package scalars
 */
final class Float extends Number
{
    /**
     * Used for typecasting internally
     */
    const TYPE = 'float';


    /**
     * Create a new instance
     *
     * @param float $val Value of this float
     */
    public function __construct($val)
    {
        parent::__construct($val);

        // Validate...
        if (! is_float($this->val)) {
            return $this->panic();
        }
    }
}
