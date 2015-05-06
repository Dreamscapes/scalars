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
 * Class representing a Number (either integer of float)
 *
 * @package scalars
 */
class Number extends Scalar
{
    // Intentionally omitting - it is not clear if the end result should be int or float
    // const TYPE = Int? Float? Monkey???


    /**
     * Create a new instance
     *
     * @param int|float $val Value of this number
     */
    public function __construct($val)
    {
        parent::__construct($val);

        // Validate...
        if (! (is_integer($this->val) || is_float($this->val))) {
            return $this->panic();
        }
    }
}
