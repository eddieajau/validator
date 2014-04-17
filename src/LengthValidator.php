<?php
/**
 * @copyright  Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license    https://www.gnu.org/licenses/old-licenses/lgpl-2.1.html  LGPL-2.1+
 */

namespace Joomla\Validator;

use Joomla\String\String;

/**
 * Validates the value against the minimum and maximum length options if set.
 *
 * Options:
 * - min : the minimum string length
 * - max : the maximum string length
 *
 * @since  1.0
 */
class LengthValidator extends AbstractValidator
{
	/**
	 * Error code for a string that is too short.
	 *
	 * @var    string
	 * @since  1.0
	 */
	const TOO_SHORT = 'LengthTooShort';

	/**
	 * Error code for a string that is too long.
	 *
	 * @var    string
	 * @since  1.0
	 */
	const TOO_LONG = 'LengthTooLong';

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
		$min = $this->getOption('min');
		$max = $this->getOption('max');

		if ($min && String::strlen($value) < $min)
		{
			$this->addError(self::TOO_SHORT);

			return false;
		}

		if ($max && String::strlen($value) > $max)
		{
			$this->addError(self::TOO_LONG);

			return false;
		}

		return true;
	}
}
