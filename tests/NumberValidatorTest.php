<?php
/**
 * @copyright  Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license    https://www.gnu.org/licenses/old-licenses/lgpl-2.1.html  LGPL-2.1+
 */

namespace Joomla\Validator;

/**
 * Tests for the Joomla\Validator\Number class.
 *
 * @since  1.0
 */
class NumberValidatorTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * Seeds data for the testValidate method.
	 *
	 * @return  array
	 *
	 * @since   1.0
	 */
	public function seedTestDoIsValid()
	{
		return array(
			// Expected, value, $options
			array(true, '1'),
			array(true, '1.01'),
			array(true, '-1.01'),
			array(false, '1a'),
		);
	}

	/**
	 * Tests the Joomla\Validator\NumberValidator::doIsValid method.
	 *
	 * @param   mixed  $expected  The expected result for isValid.
	 * @param   mixed  $value     The value to validate.
	 * @param   mixed  $options   The options for the validator.
	 *
	 * @return  void
	 *
	 * @covers        Joomla\Validator\NumberValidator::doIsValid
	 * @dataProvider  seedTestDoIsValid
	 * @since         1.0
	 */
	public function testDoIsValid($expected, $value, $options = null)
	{
		$instance = new NumberValidator($options);
		$this->assertEquals($expected, $this->invoke($instance, 'doIsValid', $value));
	}

	/**
	 * Helper method that invokes a protected or private method in a class by reflection.
	 *
	 * @param   object  $object      The object.
	 * @param   string  $methodName  The name of the method to invoke.
	 *
	 * @return  mixed
	 *
	 * @since  1.0
	 */
	protected function invoke($object, $methodName)
	{
		$method = new \ReflectionMethod($object, $methodName);
		$method->setAccessible(true);

		return $method->invokeArgs($object, array_slice(func_get_args(), 2));
	}
}
