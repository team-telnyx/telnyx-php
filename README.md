# Telnyx PHP bindings

[![Build Status](https://travis-ci.org/telnyx/telnyx-php.svg?branch=master)](https://travis-ci.org/telnyx/telnyx-php)
[![Latest Stable Version](https://poser.pugx.org/telnyx/telnyx-php/v/stable.svg)](https://packagist.org/packages/telnyx/telnyx-php)
[![Total Downloads](https://poser.pugx.org/telnyx/telnyx-php/downloads.svg)](https://packagist.org/packages/telnyx/telnyx-php)
[![License](https://poser.pugx.org/telnyx/telnyx-php/license.svg)](https://packagist.org/packages/telnyx/telnyx-php)
[![Code Coverage](https://coveralls.io/repos/telnyx/telnyx-php/badge.svg?branch=master)](https://coveralls.io/r/telnyx/telnyx-php?branch=master)

You can sign up for a Telnyx account at https://telnyx.com.

## Requirements

PHP 5.4.0 and later.

## Composer

You can install the bindings via [Composer](http://getcomposer.org/). Run the following command:

```bash
composer require telnyx/telnyx-php
```

To use the bindings, use Composer's [autoload](https://getcomposer.org/doc/01-basic-usage.md#autoloading):

```php
require_once('vendor/autoload.php');
```

## Manual Installation

If you do not wish to use Composer, you can download the [latest release](https://github.com/team-telnyx/telnyx-php/releases). Then, to use the bindings, include the `init.php` file.

```php
require_once('/path/to/telnyx-php/init.php');
```

## Dependencies

The bindings require the following extensions in order to work properly:

- [`curl`](https://secure.php.net/manual/en/book.curl.php), although you can use your own non-cURL client if you prefer
- [`json`](https://secure.php.net/manual/en/book.json.php)
- [`mbstring`](https://secure.php.net/manual/en/book.mbstring.php) (Multibyte String)

If you use Composer, these dependencies should be handled automatically. If you install manually, you'll want to make sure that these extensions are available.

## Getting Started

Simple usage looks like:

```php
\Telnyx\Telnyx::setApiKey('sk_test_BQokikJOvBiI2HlWgH4olfQ2');
$order = \Telnyx\NumberOrder::create(['phone_number' => '+18665552368']);
echo $order;
```

## Documentation

Please see https://telnyx.com/docs/api/v2/overview for up-to-date documentation.

## Legacy Version Support

### PHP 5.3

If you are using PHP 5.3, you can download v5.9.2 ([zip](https://github.com/team-telnyx/telnyx-php/archive/v5.9.2.zip), [tar.gz](https://github.com/team-telnyx/telnyx-php/archive/v5.9.2.tar.gz)) from our [releases page](https://github.com/team-telnyx/telnyx-php/releases). This version will continue to work with new versions of the Telnyx API for all common uses.

### PHP 5.2

If you are using PHP 5.2, you can download v1.18.0 ([zip](https://github.com/team-telnyx/telnyx-php/archive/v1.18.0.zip), [tar.gz](https://github.com/team-telnyx/telnyx-php/archive/v1.18.0.tar.gz)) from our [releases page](https://github.com/team-telnyx/telnyx-php/releases). This version will continue to work with new versions of the Telnyx API for all common uses.

This legacy version may be included via `require_once("/path/to/telnyx-php/lib/Telnyx.php");`, and used like:

```php
Telnyx::setApiKey('d8e8fca2dc0f896fd7cb4cb0031ba249');
$order = Telnyx_Number_Order::create(array('phone_number' => '+18665552368'));
echo $order;
```

## Custom Request Timeouts

To modify request timeouts (connect or total, in seconds) you'll need to tell the API client to use a CurlClient other than its default. You'll set the timeouts in that CurlClient.

```php
// set up your tweaked Curl client
$curl = new \Telnyx\HttpClient\CurlClient();
$curl->setTimeout(10); // default is \Telnyx\HttpClient\CurlClient::DEFAULT_TIMEOUT
$curl->setConnectTimeout(5); // default is \Telnyx\HttpClient\CurlClient::DEFAULT_CONNECT_TIMEOUT

echo $curl->getTimeout(); // 10
echo $curl->getConnectTimeout(); // 5

// tell Telnyx to use the tweaked client
\Telnyx\ApiRequestor::setHttpClient($curl);

// use the Telnyx API client as you normally would
```

## Custom cURL Options (e.g. proxies)

Need to set a proxy for your requests? Pass in the requisite `CURLOPT_*` array to the CurlClient constructor, using the same syntax as `curl_stopt_array()`. This will set the default cURL options for each HTTP request made by the SDK, though many more common options (e.g. timeouts; see above on how to set those) will be overridden by the client even if set here.

```php
// set up your tweaked Curl client
$curl = new \Telnyx\HttpClient\CurlClient([CURLOPT_PROXY => 'proxy.local:80']);
// tell Telnyx to use the tweaked client
\Telnyx\ApiRequestor::setHttpClient($curl);
```

Alternately, a callable can be passed to the CurlClient constructor that returns the above array based on request inputs. See `testDefaultOptions()` in `tests/CurlClientTest.php` for an example of this behavior. Note that the callable is called at the beginning of every API request, before the request is sent.

### Configuring a Logger

The library does minimal logging, but it can be configured
with a [`PSR-3` compatible logger][psr3] so that messages
end up there instead of `error_log`:

```php
\Telnyx\Telnyx::setLogger($logger);
```

### Accessing response data

You can access the data from the last API response on any object via `getLastResponse()`.

```php
$order = \Telnyx\NumberOrder::create(['phone_number' => '+18665552368']);
echo $order->getLastResponse()->headers['Request-Id'];
```

### SSL / TLS compatibility issues

Telnyx's API now requires that all connections use TLS 1.2. Some systems (most notably some older CentOS and RHEL versions) are capable of using TLS 1.2 but will use TLS 1.0 or 1.1 by default.

The recommended course of action is to upgrade your cURL and OpenSSL packages so that TLS 1.2 is used by default, but if that is not possible, you might be able to solve the issue by setting the `CURLOPT_SSLVERSION` option to either `CURL_SSLVERSION_TLSv1` or `CURL_SSLVERSION_TLSv1_2`:

```php
$curl = new \Telnyx\HttpClient\CurlClient([CURLOPT_SSLVERSION => CURL_SSLVERSION_TLSv1]);
\Telnyx\ApiRequestor::setHttpClient($curl);
```

### Per-request Configuration

For apps that need to use multiple keys during the lifetime of a process it's also possible to set a
per-request key and/or account:

```php
\Telnyx\NumberOrder::all([], [
    'api_key' => 'sk_test_...'
]);

\Telnyx\NumberOrder::retrieve("ch_18atAXCdGbJFKhCuBAa4532Z", [
    'api_key' => 'sk_test_...'
]);
```

### Configuring Automatic Retries

The library can be configured to automatically retry requests that fail due to
an intermittent network problem:

```php
\Telnyx\Telnyx::setMaxNetworkRetries(2);
```

Idempotency keys are added to requests to guarantee that
retries are safe.

## Development

Get [Composer][composer]. For example, on Mac OS:

```bash
brew install composer
```

Install dependencies:

```bash
composer install
```

The test suite depends on [telnyx-mock], so make sure to fetch and run it from a
background terminal ([telnyx-mock's README][telnyx-mock] also contains
instructions for installing via Homebrew and other methods):

```bash
go get -u github.com/team-telnyx/telnyx-mock
telnyx-mock
```

Install dependencies as mentioned above (which will resolve [PHPUnit](http://packagist.org/packages/phpunit/phpunit)), then you can run the test suite:

```bash
./vendor/bin/phpunit
```

Or to run an individual test file:

```bash
./vendor/bin/phpunit tests/UtilTest.php
```

Update bundled CA certificates from the [Mozilla cURL release][curl]:

```bash
./update_certs.php
```

## Attention plugin developers

Are you writing a plugin that integrates Telnyx and embeds our library? Then please use the `setAppInfo` function to identify your plugin. For example:

```php
\Telnyx\Telnyx::setAppInfo("MyAwesomePlugin", "1.2.34", "https://myawesomeplugin.info");
```

The method should be called once, before any request is sent to the API. The second and third parameters are optional.

### SSL / TLS configuration option

See the "SSL / TLS compatibility issues" paragraph above for full context. If you want to ensure that your plugin can be used on all systems, you should add a configuration option to let your users choose between different values for `CURLOPT_SSLVERSION`: none (default), `CURL_SSLVERSION_TLSv1` and `CURL_SSLVERSION_TLSv1_2`.

[composer]: https://getcomposer.org/
[curl]: http://curl.haxx.se/docs/caextract.html
[psr3]: http://www.php-fig.org/psr/psr-3/
[telnyx-mock]: https://github.com/telnyx/telnyx-mock
