# Web Server

[![Travis Build Status][icon-status]][link-status]
[![Packagist Downloads][icon-downloads]][link-downloads]
[![License][icon-license]](LICENSE.md)

Run and/or control a web server programmatically.

- [Install](#install)
- [Usage](#usage)
  - [PHP Web Server](#php-web-server)
    - [Public path](#public-path)
    - [Host](#host)
    - [Port](#port)
    - [URL](#url)
- [API](#api)
  - [Start a web server](#start-a-web-server)
  - [Stop a web server](#stop-a-web-server)
  - [Check the running state of a web server](#check-the-running-state-of-a-web-server)
  - [Get the path to the server](#get-the-path-to-the-server)
  - [Get the URL of the server](#get-the-url-of-the-server)
- [Changelog](#changelog)
- [Testing](#testing)
- [Contributing](#contributing)
- [Security](#security)
- [Credits](#credits)
- [License](#license)

## Install

You may install this package using [composer][link-composer].

```shell
$ composer require bhittani/web-server --prefer-dist
```

## Usage

By default, this package offers a php web server that uses the built-in development server.

### PHP Web Server

This uses the built-in development server.

```php
<?php

require_once __DIR__ . '/vendor/autoload.php';

$webServer = new \Bhittani\WebServer\Php('/path/to/www/public/index.php');
```

#### Public path

```php
<?php

$webServer->path('/path/to/www/public');
```

> The default path is set to the directory of the server file.

#### Host

```php
<?php

$webServer->host('127.0.0.1');
```

> The default host is set to `localhost`.

#### Port

```php
<?php

$webServer->port(3000);
```

> The default port is set to `9001`.

#### URL

```php
<?php

$webServer->url('https://localhost');
```

> The default url is set to `http://<host>:<port>`.

## API

The following API will be available for any web server adhering to the contract/interface.

### Start a web server

```php
<?php

$webServer->start();
```

### Stop a web server

```php
<?php

$webServer->stop();
```

### Check the running state of a web server

```php
<?php

$webServer->isRunning();
```

### Get the path to the server

```php
<?php

$webServer->getPath();
```

### Get the URL of the server

```php
<?php

$webServer->getUrl();
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed.

## Testing

```shell
git clone https://github.com/kamalkhan/web-server

cd web-server

composer install

composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email `shout@bhittani.com` instead of using the issue tracker.

## Credits

- [Kamal Khan](http://bhittani.com)
- [All Contributors](https://github.com/kamalkhan/web-server/contributors)

## License

The MIT License (MIT). Please see the [License File](LICENSE.md) for more information.

<!--Status-->
[icon-status]: https://img.shields.io/travis/kamalkhan/web-server.svg?style=flat-square
[link-status]: https://travis-ci.org/kamalkhan/web-server
<!--Downloads-->
[icon-downloads]: https://img.shields.io/packagist/dt/bhittani/web-server.svg?style=flat-square
[link-downloads]: https://packagist.org/packages/bhittani/web-server
<!--License-->
[icon-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
<!--composer-->
[link-composer]: https://getcomposer.org
