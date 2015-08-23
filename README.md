# bind-mailer

[![Release](https://img.shields.io/packagist/v/icanboogie/bind-mailer.svg)](https://packagist.org/packages/icanboogie/bind-mailer)
[![Build Status](https://img.shields.io/travis/ICanBoogie/bind-mailer/master.svg)](http://travis-ci.org/ICanBoogie/bind-mailer)
[![HHVM](https://img.shields.io/hhvm/icanboogie/bind-mailer.svg)](http://hhvm.h4cc.de/package/icanboogie/bind-mailer)
[![Code Quality](https://img.shields.io/scrutinizer/g/ICanBoogie/bind-mailer/master.svg)](https://scrutinizer-ci.com/g/ICanBoogie/bind-mailer)
[![Code Coverage](https://img.shields.io/coveralls/ICanBoogie/bind-mailer/master.svg)](https://coveralls.io/r/ICanBoogie/bind-mailer)
[![Packagist](https://img.shields.io/packagist/dt/icanboogie/bind-mailer.svg)](https://packagist.org/packages/icanboogie/bind-mailer)

The **icanboogie/bind-mailer** package binds [icanboogie/mailer][] to [ICanBoogie][],
using its [Autoconfig feature][]. It provides a configuration synthesizer for
the `mailer` config and prototype bindings for the [Core][] instance.

```php
<?php

namespace ICanBoogie;

require 'vendor/autoload.php';

$app = boot();

$config = $app->configs['mailer']; // obtain the "mailer" config.
$config['deliverer'];              // class name or callable to create the deliverer instance.
$config['mailer'];                 // class name or callable to create the mailer instance.

$app->mailer; //instance of ICanBoogie\Mailer\Mailer;
$app->mail([

	'to' => "example@example.com",
	'from' => "me@example.com",
	'subject' => "Testing",
	'body' => "Hello world!"

], $options = []);
```





## Before and after the message is sent

If `sender` is defined in the `mail()` options the following events are triggered:

- The `<class>:mail:before` event of class [BeforeMailEvent][] is fired before the message
is sent by the mailer. Third parties may use this event to alter the message or the mailer that
will be used to send it.

- The `<class>:mail` event of class [MailEvent][] is fired after the message was sent by the
mailer. Third parties may use this event to alter the result returned by the mailer.

Where `<class>` is the class of the sender.





----------





## Requirements

The package requires PHP 5.5 or later.





## Installation

The recommended way to install this package is through [Composer](http://getcomposer.org/):

```
$ composer require icanboogie/bind-mailer
```

The package only specifies a minimum version while requiring [icanboogie/icanboogie][] and
[icanboogie/prototype], you might want to specify which version to use in your "composer.json" file.





### Cloning the repository

The package is [available on GitHub](https://github.com/ICanBoogie/bind-mailer), its repository
can be cloned with the following command line:

	$ git clone https://github.com/ICanBoogie/bind-mailer.git





## Documentation

The package is documented as part of the [ICanBoogie][] framework
[documentation][]. You can generate the documentation for the package
and its dependencies with the `make doc` command. The documentation is generated in the
`build/docs` directory. [ApiGen](http://apigen.org/) is required. The directory can later be
cleaned with the `make clean` command.





## Testing

The test suite is ran with the `make test` command. [PHPUnit](https://phpunit.de/) and
[Composer](http://getcomposer.org/) need to be globally available to run the suite. The command
installs dependencies as required. The `make test-coverage` command runs test suite and also
creates an HTML coverage report in "build/coverage". The directory can later be cleaned with
the `make clean` command.

The package is continuously tested by [Travis CI](http://about.travis-ci.org/).

[![Build Status](https://img.shields.io/travis/ICanBoogie/bind-mailer/master.svg)](https://travis-ci.org/ICanBoogie/bind-mailer)
[![Code Coverage](https://img.shields.io/coveralls/ICanBoogie/bind-mailer/master.svg)](https://coveralls.io/r/ICanBoogie/bind-mailer)





## License

**icanboogie/bind-mailer** is licensed under the New BSD License - See the [LICENSE](LICENSE) file for details.





[documentation]:         http://api.icanboogie.org/bind-mailer/0.1/
[BeforeMailEvent]:       http://api.icanboogie.org/bind-mailer/0.1/class-ICanBoogie.Binding.Mailer.BeforeMailEvent.html
[MailEvent]:             http://api.icanboogie.org/bind-mailer/0.1/class-ICanBoogie.Binding.Mailer.MailEvent.html
[Core]:                  http://api.icanboogie.org/icanboogie/2.4/class-ICanBoogie.Core.html
[Mailer]:                http://api.icanboogie.org/mailer/1.1/class-ICanBoogie.Mailer.Mailer.html
[icanboogie/icanboogie]: https://github.com/ICanBoogie/ICanBoogie
[icanboogie/mailer]:     https://github.com/ICanBoogie/Mailer
[Autoconfig feature]:    https://github.com/ICanBoogie/ICanBoogie#autoconfig
[ICanBoogie]:            https://github.com/ICanBoogie/ICanBoogie
