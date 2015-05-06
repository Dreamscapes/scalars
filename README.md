# Scalars

![Built with GNU Make][make-badge]

> Scalar value typehinting in PHP

## About

With this library, you can use function/method typehinting for scalar values just like you would use it with objects.

## Installation

Use Composer:

`composer require dreamscapes/scalars:dev-master` (visit [Packagist][packagist] for list of all available versions)

## Usage

The following scalar types are available as classes:

- **Scalar** - accepts any scalar value (bool, int, float, string)
- **Number** - accepts any numeric value (float, int)
- **Int** - accepts only integers
- **Float** - accepts only floating point numbers
- **Bool** - accepts only booleans
- **String** - accepts only strings

Any of these can be used in function / method signatures:

```php
function takeString(String $str) { /* do stuff with $str */ }
```

To pass a string into such function, you have two, completely equivalent options:

```php
takeString(String('my string'));
// or...
takeString(new String('my string'));
```

And, within the function itself, you can get to the actual value passed by doing one of the following:

```php
function takeString(String $str)
{
    // $str is instance of String, but we need the actual string
    // to do something useful with it:
    $str = $str->val;
    // or...
    $str = $str();
}
```

### What if I use incorrect scalar type?

Having type hints without type safety would be like having classes without instances. And so, if you attempt to do something like this

```php
// WARNING - BAD!
$bool = Bool('but I am a string!');
```

You will trigger an error (`E_USER_ERROR` to be precise):
> *Invalid type supplied for Bool, string given*

**Note:** Do not attempt to convert these to exceptions and catch them - these kinds of errors are programmers' errors and should be fixed immediately.

### Casting into different types

If you have a value and you want it to be treated as a particular scalar type (i.e. you have an integer and want it to be treated as boolean), you can use one of the following, completely equivalent options:

```php
$bool = Bool((bool)'I will be truthy!');
// or...
$bool = Bool::cast('I will also be truthy!');
```

The `Scalar::cast()` method utilises PHP's internal scalar conversion mechanism using [`settype`][settype()]. Whether that is a good or a bad thing is left to your own discretion.

### Where are arrays?

Arrays are not a scalar type. And you can typehint arrays without any syntactic sugar.

## License

This software is licensed under the **BSD (3-Clause) License**.
See the [LICENSE](LICENSE) file for more information.


[make-badge]: https://img.shields.io/badge/built%20with-GNU%20Make-brightgreen.svg
[packagist]: https://packagist.org/packages/Dreamscapes/scalars
[settype()]: http://php.net/manual/en/function.settype.php
