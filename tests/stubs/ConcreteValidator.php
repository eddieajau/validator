<?php
/**
 * @copyright  Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license    https://www.gnu.org/licenses/old-licenses/lgpl-2.1.html  LGPL-2.1+
 */

/**
 * Integer validator.
 *
 * @since  1.0
 */
class ConcreteValidator extends \Joomla\Validator\AbstractValidator
{
	/**
	 * Validates the value.
	 *
	 * @param   mixed  $value  The value to validate.
	 *
	 * @return  null
	 *
	 * @since   1.0
	 */
	public function doIsValid($value)
	{
		if (is_string($value) && false !== strpos($value, 'INVALID'))
		{
			$this->addError('invalid');

			return false;
		}

		return true;
	}
}
