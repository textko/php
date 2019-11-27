# Textko PHP SDK

This is the official PHP library for [Textko.com](https://textko.com) API.

## Installation
You can install our library via composer.
```bash
composer require textko/php
```

For more info, see: [Packagist](https://packagist.org/packages/textko/php)

## Get Your API Access Token
To start using this library, you need an API Access Token first.

[Register to Get Your Access Token](https://textko.com/register)

## Quick Usage

To send a text message:

Example:
```php
<?php require_once 'vendor/autoload.php';

$textko = new Textko\Sms('your-access-token-here');

$sms = $textko->send('09171234567', 'My awesome text message');

$sms->smsId(); // Get sms id.
$sms->toNo(); // Get recipient to no.
$sms->text(); // Get sms text.
$sms->status(); // Get sms current status.

```

## Get List of Sms

To get your list of sms, use the `getList()` function.

Example:
```php
<?php require_once 'vendor/autoload.php';

$textko = new Textko\Sms('your-access-token-here');

$list = $textko->getList();

$list->data(); // Get list of sms.

```

## Get a Message

To get a specific sms, use the `get($smsId)` function. The sms id is required.

Example:
```php
<?php require_once 'vendor/autoload.php';

$textko = new Textko\Sms('your-access-token-here');

$smsId = 'ABC';
$sms = $textko->get($smsId);

$sms->smsId(); // Get sms id.
$sms->toNo(); // Get recipient to no.
$sms->text(); // Get sms text.
$sms->status(); // Get sms current status.

```

## Response &amp; Errors

Usually all API responses are in the form of a `SmsResponseContract`.
And if something is wrong, it will throw `SmsException`.

## REST API Documentation

To learn more about our REST API documentation.

See: [API Documentation](http://textko.com/developers)

## Need help?

Feel free to contact us. We are happy to assist.

**Email**: [hello@textko.com](mailto:hello@textko.com)

**Facebook**: [/textko](https://fb.com/textko)

**Twitter**: [@textko](https://twitter.com/textko)

**Chat**: [See our website](https://textko.com)