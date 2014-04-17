<?php
/**
 * @copyright  Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license    https://www.gnu.org/licenses/old-licenses/lgpl-2.1.html  LGPL-2.1+
 */

namespace Joomla\Validator;

/**
 * Validates the value as an integer.
 *
 * Options:
 * - min : the minimum integer value
 * - max : the maximum integer value
 *
 * @since  1.0
 */
class IntegerValidator extends RangeValidator
{
	/**
	 * Error code for an invalid integer.
	 *
	 * @var    string
	 * @since  1.0
	 */
	const INVALID = 'InvalidInteger';

	/**
	 * Validates the value.
	 *
	 * @param   scalar  $value  The value to validate.
	 *
	 * @return  boolean
	 *
	 * @since   1.0
	 */
	protected function doIsValid($value)
	{
		if (!filter_var($value, FILTER_VALIDATE_INT))
		{
			$this->addError(self::INVALID);

			return false;
		}

		return true;
	}
}
