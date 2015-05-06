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
 * Class representing an integer
 *
 * @package scalars
 */
final class Int extends Number
{
    /**
     * Used for typecasting internally
     */
    const TYPE = 'int';


    /**
     * Create a new instance
     *
     * @param int $val Value of this integer
     */
    public function __construct($val)
    {
        parent::__construct($val);

        // Validate...
        if (! is_integer($this->val)) {
            return $this->panic();
        }
    }
}
