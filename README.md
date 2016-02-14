# nia - Time Formatter

Component with several time formatter implementations.

## Installation

Require this package with Composer.

```bash
	composer require nia/formatting-time
```

## Tests
To run the unit test use the following command:

    $ cd /path/to/nia/component/
    $ phpunit --bootstrap=vendor/autoload.php tests/


## Formatters
The component provides several formatters but you are able to write your own time formatter by implementing the `Nia\Formatting\Time\TimeFormatterInterface` interface for a more specific use case.


## How to use
The following sample shows you how to use the `Nia\Formatting\Time\DateTimeFormatter`.

```php
	$formatter = new DateTimeFormatter('de_DE', 'America/New_York');
	echo $formatter->format('2015-12-12 13:45:12'); // 12;12.12.15 08:45

	$formatter = new DateTimeFormatter('en_US', 'America/New_York');
	echo $formatter->format('2015-12-12 13:45:12'); // 12/12/15, 8:45 AM
```
