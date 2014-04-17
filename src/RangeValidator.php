<?php
/**
 * @copyright  Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license    https://www.gnu.org/licenses/old-licenses/lgpl-2.1.html  LGPL-2.1+
 */

namespace Joomla\Validator;

/**
 * Validates the value against the minimum and maximum range options if set.
 *
 * @since  1.0
 */
class RangeValidator extends AbstractValidator
{
	/**
	 * Error code if the value is invalid.
	 *
	 * @var    string
	 * @since  1.0
	 */
	const INVALID = 'RangeInvalid';

	/**
	 * Error code for a number that is too low.
	 *
	 * @var    string
	 * @since  1.0
	 */
	const TOO_LOW = 'RangeTooLow';

	/**
	 * Error code for a number that is too high.
	 *
	 * @var    string
	 * @since  1.0
	 */
	const TOO_HIGH = 'RangeTooHigh';

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
		if (!is_numeric($value))
		{
			$this->addError(self::INVALID);

			return false;
		}

		$min = $this->getOption('min');
		$max = $this->getOption('max');

		if ($min && $value < $min)
		{
			$this->addError(self::TOO_LOW);

			return false;
		}
		elseif ($max && $value > $max)
		{
			$this->addError(self::TOO_HIGH);

			return false;
		}

		return true;
	}
}
