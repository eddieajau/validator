<?php
/**
 * @copyright  Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license    https://www.gnu.org/licenses/old-licenses/lgpl-2.1.html  LGPL-2.1+
 */

namespace Joomla\Validator;

/**
 * Abstract validator.
 *
 * @since  1.0
 */
abstract class AbstractValidator implements ValidatorInterface
{
	/**
	 * An associative array of errors.
	 *
	 * @var    string[]
	 * @since  1.0
	 */
	private $errors;

	/**
	 * The validation options.
	 *
	 * @var    array
	 * @since  1.0
	 */
	private $options;

	/**
	 * The last value to be validated.
	 *
	 * @var    mixed
	 * @since  1.0
	 */
	private $value;

	/**
	 * Validator class contructor.
	 *
	 * @param   array  $options  An associative array of (name => value) configuration options for the validator.
	 *
	 * @since   1.0
	 */
	public function __construct(array $options = null)
	{
		if (empty($options))
		{
			$options = array();
		}

		foreach ($options as $name => $value)
		{
			$this->setOption($name, $value);
		}

		$this->errors = array();
	}

	/**
	 * Converts the validator to a string representation.
	 *
	 * @return  string
	 *
	 * @since   1.0
	 */
	public function __toString()
	{
		return json_encode(array('type' => __CLASS__, 'options' => $this->options));
	}

	/**
	 * Gets the errors if the value was invalid.
	 *
	 * @return  array[]  An associative array of "Error Code" => "Error Data" values, where "data" is an array.
	 *
	 * @since   1.0
	 */
	public function getErrors()
	{
		return $this->errors;
	}

	/**
	 * Gets a configuration option.
	 *
	 * @param   string  $name  The name of the option.
	 *
	 * @return  mixed
	 *
	 * @since   1.0
	 */
	public function getOption($name)
	{
		return isset($this->options[$name]) ? $this->options[$name] : null;
	}

	/**
	 * Checks that the value is valid.
	 *
	 * @param   mixed  $value  The value to validate.
	 *
	 * @return  null
	 *
	 * @since   1.0
	 */
	public function isValid($value)
	{
		// Store the value being tested for the error to report it.
		$this->value = $value;
		$this->errors = array();

		return $this->doIsValid($value);
	}

	/**
	 * Sets a configuration option.
	 *
	 * @param   string  $name   The name of the option.
	 * @param   scalar  $value  The value of the option.
	 *
	 * @return  AbstractValidator  Returns itself to support chaining.
	 */
	public function setOption($name, $value)
	{
		$this->options[$name] = $value;

		return $this;
	}

	/**
	 * Adds a validation error code.
	 *
	 * @param   string  $code  The validation code.
	 *
	 * @return  AbstractValidator  Returns itself to support chaining.
	 *
	 * @since   1.0
	 */
	protected function addError($code)
	{
		$error = $this->options;
		$error['value'] = $this->value;
		$this->errors[$code] = $error;

		return $this;
	}

	/**
	 * Checks that the value is valid.
	 *
	 * @param   mixed  $value  The value to validate.
	 *
	 * @return  boolean
	 *
	 * @since   1.0
	 */
	abstract protected function doIsValid($value);
}
