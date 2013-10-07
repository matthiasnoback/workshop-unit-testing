# Cheatsheet: Unit testing with PHPUnit

By Matthias Noback - [php-and-symfony.matthiasnoback.nl](http://php-and-symfony.matthiasnoback.nl)

## Installation

To install PHPUnit in a project, add it to ``composer.json``:

    {
        "require-dev": {
            "phpunit/phpunit": "3.7.*"
        }
    }

Then run:

    php composer.phar update phpunit/phpunit

## Command-line

To run tests on the command-line:

    vendor/bin/phpunit

### Switches

<dl>
<dt><code>--group [name-of-group]</code></dt>
<dd>Run tests in a given group</dd>
<dt><code>--filter [name-of-class] or --filter [name-of-class::testMethod]</code></dt>
<dd>Run tests of which the class name matches the given name and optionally only run the
    given test method</dd>
<dt><code>--coverage-text</code></dt>
<dd>Generate a simple code coverage report</dd>
<dt><code>--coverage-html [directory-for-html-coverage-generation]</code></dt>
<dd>Generate a good-looking HTML code coverage report</dd>
</dl>

## Test cases

### Structure of a test

**Arrange**: prepare the subject under test (SUT), create some other objects, or set some other variables.

**Act**: call a method on the SUT, probably catch the return value.

**Assert**: make one precise assertion about the return value or the current state of the SUT.

### Assertions

<dl>
    <dt><code>assertTrue($actual)</code></dt>
    <dd>The argument should be <code>true</code></dd>
    <dt><code>assertFalse($actual)</code></dt>
    <dd>The argument should be <code>false</code></dd>
    <dt><code>assertSame($expected, $actual)</code></dt>
    <dd>The arguments should have an equal value and be of the same type. When both arguments are objects they should point to the same object.</dd>
    <dt><code>assertEquals($expected, $actual)</code></dt>
    <dd>The arguments should have an equal value, but don't need to be of the same type. When both arguments are objects, their attributes should all have equal values.</dd>
</dl>

### Mocks

    $mock = $this
        ->getMockBuilder($className) // or interface name
        ->disableOriginalConstructor() // when mocking classes
        ->setMethods(array(...)) // when mocking classes
        ->getMock();

    $mock
        ->expects(...) // see matchers for invocations
        ->method(...) // constant
        ->with(..., ..., ...) // optional, see matchers for method arguments
        ->will(...) // optional, see return values

#### Matchers for invocations

<dl>
<dt><code>$this->any()</code></dt>
    <dd>Any number of invocations</dd>
<dt><code>$this->once()</code>
    <dd>One invocation, and not more than one</dd>
<dt><code>$this->atLeastOnce()</code></dt>
    <dd>At least one invocation</dd>
<dt><code>$this->never()</code></dt>
    <dd>No invocations</dd>
<dt><code>$this->exactly(...)</code></dt>
    <dd>A specific number of invocations</dd>
    <dt><code>$this->at(...)</code></dt>
    <dd>Match multiple invocations by index: 0, 1, 2, ...</dd>
</dl>

#### Constraints for method arguments

Any constraint used by assertions can be used here:

    $this->equalTo(...)
    $this->identicalTo(...)
    ...

#### Stubbing return values

<dl>
    <dt><code>$this->returnValue(...)</code></dt>
    <dd>Return a specific value</dd>
    <dt><code>$this->returnCallback(function($argument, ...) { ... });</code></dt>
    <dd>Use a function to determine the return value (and maybe collect and
    verify some of the original arguments)</dd>
</dl>

### Set-up and tear-down

    class SomeTest extends \PHPUnit_Framework_TestCase
    {
        public static function setUpBeforeClass()
        {
            // run before any test method of this class will be executed
        }

        protected function setUp()
        {
            // run before each test method
        }

        protected function tearDown()
        {
            // run after each test method
        }

        public static function tearDownAfterClass()
        {
            // run after all test methods of this class have been executed
        }
    }

### Skipping tests

<dl>
    <dt><code>$this->markTestIncomplete()</code></dt>
    <dd>To mark a test as "not implemented" or "not good enough" to be trusted as a test</dd>
    <dt><code>$this->markTestSkipped()</code></dt>
    <dd>To skip a test when the environment is not suitable for it (e.g. a PHP extension is missing)</dd>
</dl>
