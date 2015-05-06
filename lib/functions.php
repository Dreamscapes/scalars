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
 * Helper function to construct a new instance of Scalar
 *
 * @package scalars
 *
 * @param mixed $val
 */
function Scalar($val)
{
    return new Scalar($val);
}

/**
 * Helper function to construct a new instance of Bool
 *
 * @package scalars
 *
 * @param bool $val
 */
function Bool($val)
{
    return new Bool($val);
}

/**
 * Helper function to construct a new instance of String
 *
 * @package scalars
 *
 * @param string $val
 */
function String($val)
{
    return new String($val);
}

/**
 * Helper function to construct a new instance of Number
 *
 * @package scalars
 *
 * @param int|float $val
 */
function Number($val)
{
    return new Number($val);
}

/**
 * Helper function to construct a new instance of Int
 *
 * @package scalars
 *
 * @param int $val
 */
function Int($val)
{
    return new Int($val);
}

/**
 * Helper function to construct a new instance of Float
 *
 * @package scalars
 *
 * @param float $val
 */
function Float($val)
{
    return new Float($val);
}
