What is this package
====================

This package contains a PSR-3 compliant composite logger class.

In practice, this class does not log anything but delegates logging to one or many PSR-3 compliant loggers.
This is useful when you want to call multiple loggers at one.

Install
-------

```sh
composer require mouf/utils.log.psr.multi-logger
```

Usage
-----

Simply pass an array of loggers to the multi-logger:

```php
$logger1 = new MyLogger();
$logger2 = new AnotherLogger();

$multiLogger = new Mouf\Utils\Log\Psr\MultiLogger([ $logger1, $logger2 ]);
```

You can also add loggers using the `addLogger` method:

```php
$logger1 = new MyLogger();
$logger2 = new AnotherLogger();

$multiLogger = new Mouf\Utils\Log\Psr\MultiLogger();
$multiLogger->addLogger($logger1);
$multiLogger->addLogger($logger2);
```
