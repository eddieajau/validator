<?php
/**
 * @copyright  Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license    https://www.gnu.org/licenses/old-licenses/lgpl-2.1.html  LGPL-2.1+
 */

namespace Joomla\Validator;

require_once __DIR__ . '/stubs/ConcreteValidator.php';

/**
 * Tests for the Joomla\Validator\AbstractValidator class.
 *
 * @since  1.0
 */
class AbstractValidatorTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * An instance of the class to test.
	 *
	 * @var    \ConcreteValidator
	 * @since  1.0
	 */
	private $instance;

	/**
	 * Seeds data for the testValidate method.
	 *
	 * @return  array
	 *
	 * @since   1.0
	 */
	public function seedTest__construct()
	{
		return array(
			// Name, Expected Value, Options
			array(null, 'foo'),
			array('bar', 'foo', array('foo' => 'bar')),
		);
	}

	/**
	 * Tests the Joomla\Validator\AbstractValidator::__construct method.
	 *
	 * @param   string  $expected  The expected value.
	 * @param   string  $name      The name of the configuration option to test.
	 * @param   mixed   $options   The configuration options to give to the constructor.
	 *
	 * @return  void
	 *
	 * @covers        Joomla\Validator\AbstractValidator::__construct
	 * @covers        Joomla\Validator\AbstractValidator::getOption
	 * @covers        Joomla\Validator\AbstractValidator::setOption
	 * @dataProvider  seedTest__construct
	 * @since         1.0
	 */
	public function test__construct($expected, $name, array $options = null)
	{
		$instance = new \ConcreteValidator($options);
		$this->assertEquals($expected, $instance->getOption($name));
	}

	/**
	 * Tests the Joomla\Validator\AbstractValidator::__toString method.
	 *
	 * @return  void
	 *
	 * @covers  Joomla\Validator\AbstractValidator::__toString
	 * @since   1.0
	 */
	public function test__toString()
	{
		$this->assertEquals('{"type":"Joomla\\\\Validator\\\\AbstractValidator","options":{"option":"value"}}', (string) $this->instance);
	}

	/**
	 * Tests the Joomla\Validator\AbstractValidator::addError method.
	 *
	 * @return  void
	 *
	 * @covers  Joomla\Validator\AbstractValidator::addError
	 * @covers  Joomla\Validator\AbstractValidator::getErrors
	 * @since   1.0
	 */
	public function testAddError()
	{
		$this->assertCount(0, $this->instance->getErrors());

		$this->assertSame($this->instance, $this->invoke('addError', 'error'), 'Checks chaining');

		$errors = $this->instance->getErrors();
		$firstKey = array_shift(array_keys($errors));
		$firstValue = $errors[$firstKey];

		$this->assertEquals('error', $firstKey);
		$this->assertEquals(array('option' => 'value', 'value' => null), $firstValue);
	}

	/**
	 * Tests the Joomla\Validator\AbstractValidator::isValid method.
	 *
	 * @return  void
	 *
	 * @covers  Joomla\Validator\AbstractValidator::isValid
	 * @since   1.0
	 */
	public function testIsValid()
	{
		$this->assertTrue($this->instance->isValid('valid'));
		$this->assertFalse($this->instance->isValid('INVALID'));
	}

	/**
	 * Tests the Joomla\Validator\AbstractValidator::getErrors method.
	 *
	 * @return  void
	 *
	 * @covers  Joomla\Validator\AbstractValidator::getErrors
	 * @since   1.0
	 */
	public function testIsValid_errors()
	{
		$this->assertCount(0, $this->instance->getErrors());

		// Test the invalid case.
		$this->instance->isValid('INVALID');
		$this->assertCount(1, $this->instance->getErrors());

		// Test a valid case and the error reset.
		$this->instance->isValid('valid');
		$this->assertCount(0, $this->instance->getErrors());
	}

	/**
	 * Helper method that invokes a protected or private method in a class by reflection.
	 *
	 * @param   string  $methodName  The name of the method to invoke.
	 *
	 * @return  mixed
	 *
	 * @since  1.0
	 */
	protected function invoke($methodName)
	{
		$method = new \ReflectionMethod($this->instance, $methodName);
		$method->setAccessible(true);

		return $method->invokeArgs($this->instance, array_slice(func_get_args(), 1));
	}

	/**
	 * Setup the tests.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	protected function setUp()
	{
		parent::setUp();

		$options = array('option' => 'value');
		$this->instance = new \ConcreteValidator($options);
	}
}
