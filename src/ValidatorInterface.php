<?php
/**
 * @copyright  Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license    https://www.gnu.org/licenses/old-licenses/lgpl-2.1.html  LGPL-2.1+
 */

namespace Joomla\Validator;

/**
 * Validator interface.
 *
 * @since  1.0
 */
interface ValidatorInterface
{
	/**
	 * Gets the errors if the value was invalid.
	 *
	 * @return  array[]  An associative array of "Error Code" => "Error Data" values, where "data" is an array.
	 *
	 * @since   1.0
	 */
	public function getErrors();

	/**
	 * Checks that the value is valid.
	 *
	 * @param   scalar  $value  The value to validate.
	 *
	 * @return  boolean
	 *
	 * @since   1.0
	 */
	public function isValid($value);
}
