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
 * Class representing a boolean
 *
 * @package scalars
 */
final class Bool extends Scalar
{
    /**
     * Used for typecasting internally
     */
    const TYPE = 'bool';


    /**
     * Create a new instance
     *
     * @param bool $val Value of this boolean
     */
    public function __construct($val)
    {
        parent::__construct($val);

        // Validate...
        if (! is_bool($this->val)) {
            return $this->panic();
        }
    }
}
