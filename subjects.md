# Workshop unit-testing with PHPUnit

## Getting started with PHPUnit

- Installing PHPUnit using Composer
- Configuration file - [reference](http://phpunit.de/manual/current/en/appendixes.configuration.html)
- Bootstrap file
- Create a test class
- Run the tests - [reference](http://phpunit.de/manual/current/en/textui.html)

> #### Exercise: Test ``is_string()``
>
> Create a test class for testing PHP's ``is_string()`` function.
> Think of any type of input value that should be tested.

## About unit tests

### When and why?

- Before writing code
  - Test-driven development (TDD)
  - The TDD cycle
  - No unspecified behavior
  - API-driven
  - Testable code by default
- After writing the code (maybe much later, to capture its behavior)
  - Not as rewarding
  - Probably difficult because of testability
  - You know how it works, which influences the way you test
  - You'll take shortcuts

### Usefulness?

- Incremental specification of behavior
- Documentation of existing behavior
- Regression prevention
- Confidence
- Automatic and fast

## Unit tests, part I

### Tests and assertions

- True, false, null
- Same, equal
- And that's all you need!
- Exceptions

> #### Exercise: Creating and testing a simple calculate
>
> Create a calculator:
>
> - It should be able to perform "plus", "minus" and "times" operations.
> - Add test cases for normal input values (numbers) and situations, but also add tests for edge cases and invalid input
>   values.
> - Apply the TDD cycle of test - code - refactor - test - ...

## Code coverage

- Execution paths
- Complexity
- Enough coverage?
- Test coverage and TDD

## Clean tests

- Arrange, Act, Assert
- Rearrange, reuse (setUp, tearDown)
- Custom assertions
- Data provider

> #### Exercise: Test ``array_diff()``
>
> Test PHP's ``array_diff()`` function. Use the AAA cycle, think of a custom
> assertion and use a data provider to prevent code duplication.

## Unit tests, part II

- Whitebox versus blackbox testing
- Testing interaction between objects

### Stubs

"Objects faking it"

- Using the mocking framework for creating stubs
  - MockBuilder
  - Adding behavior for methods
  - Matching input arguments
  - Using a callback
- Common problems:
  - Mocking classes instead of interfaces
  - Constructors

### Mocks

"Stubs with assertions"

- Quantify method calls
- Specify order of method calls
- Common problems
  - Extra calls
  - Assertions about provided arguments

> #### Exercise: InteractiveCalculator and Output
>
> We have a simple ``Calculator`` already. Now create interactive calculator.
> It should use the provided helper class ``Dialog`` for reading input from the
> command-line and the ``Output`` class for writing output to the console.
>
> The ``InteractiveCalculator`` is already set up for you. You can run it using
>
>     php calculator.php
>
> ##### Specifications:
>
> When the calculator starts, use a dialog to ask for a number, then an
> operator, then another number. When these are provided, you can calculate the
> result using the ``Calculator`` class and display it in the console.

### Spies

"Bookkeeping stubs"

- Using callbacks to collect information
- Verify the information

### Trust

- Always fix failing tests first
- Mark tests as incomplete or skipped
