# Large Numbers

The package provides math methods that work with numbers that overflow variables values.

# How to install

Add the package

```
composer require large-numbers/large-numbers
```

# How to use

Create a class `Numbers`

```
use Numbers\Numbers;

$numbers = new Numbers();
```


# Methods

1. Get greatest common factor of two integers

```
$numbers->gcd(9, 6);
```

2. Add two large numbers represented as strings

```
$numbers->addNumbersAsStrings('4294967296', '4294967296');
```

3. Subtract large numbers represented as strings

```
$numbers->subtractNumbersAsStrings('8589934592', '4294967296');
```

4. Multiply large number represented as string and an integer number

```
$numbers->multiplyNumberAsString('4294967296', 2);
```

5. Divide large number represented as string and an integer number

```
$numbers->divideNumberAsString('8589934592', 2);
```

# Unit tests

1. Install unit test package

```
composer install --dev
```

2. Run unit tests

```
./vendor/bin/phpunit
```