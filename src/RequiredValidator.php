<?php
/**
 * @copyright  Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license    https://www.gnu.org/licenses/old-licenses/lgpl-2.1.html  LGPL-2.1+
 */

namespace Joomla\Validator;

/**
 * Validates that a value is not empty.
 *
 * @since  1.0
 */
class RequiredValidator extends AbstractValidator
{
	/**
	 * Error code for an required value.
	 *
	 * @var    string
	 * @since  1.0
	 */
	const REQUIRED = 'RequiredValue';

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
		if (null === $value || '' === $value)
		{
			$this->addError(self::REQUIRED);

			return false;
		}

		return true;
	}
}
