# Textko PHP SDK

This is the official PHP library for [Textko.com](https://textko.com) API.

## Installation
You can install our library via composer.
```bash
composer require textko/php
```

For more info, See our [Packagist Profile](https://packagist.org/packages/textko/php)

## Get Your API Token
To start using this library, you need an API Token first. Creating an API token is easy and free.

See: [Obtaining an API Token](https://textko.com/projects)

## Quick Usage

To send a text message:

```php
<?php require_once 'vendor/autoload.php';

// Initialize Textko.
$textko = new Textko\Textko($apiToken);

// Send a text message.
$response = $textko->send('09171234567', 'My awesome text message');

// Get response data.
$response->data();

```

## Response

Usually all API responses are in the form of a `\Textko\Response` object.


### Response Methods

|   | Description|
|---|---|
| `messageId()` | Useful for getting message id after sending a message.  |
| `data()` | Get response data. Usually an object containing all message info.  |
| `httpCode()` | Get HTTP code.  |
| `responseCode()` | Get response code.  |
| `responseMsg()` | Get response msg.  |
| `toArray()` | Convert response object to a array.  |
| `toJson()` | Convert response object to a JSON string.  |

## Need help?

Feel free to contact us. We are happy to assist.

**Email**: [hello@textko.com](mailto:hello@textko.com)

**Facebook**: [/textko](https://fb.com/textko)

**Twitter**: [@textko](https://twitter.com/textko)

**Chat**: [See our website](https://textko.com)