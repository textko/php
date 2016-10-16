# Textko PHP SDK

This is the official PHP library for [Textko.com](https://textko.com) API.

## Installation
You can install our library via composer.
```bash
composer require textko/php
```

For more info, see: [Packagist](https://packagist.org/packages/textko/php)

## Get Your API Token
To start using this library, you need an API Token first. Creating an API token is easy and free.

[Get your API token here](https://textko.com/projects)

## Quick Usage

To send a text message:

Example:
```php
<?php require_once 'vendor/autoload.php';

// Initialize Textko.
$textko = new Textko\Textko($apiToken);

// Send a text message.
$response = $textko->send('09171234567', 'My awesome text message');

// Get response data.
$response->data();

```

## Get List of Messages

To get your list of messages, use the `messages()` function.

Example:
```php
<?php require_once 'vendor/autoload.php';

// Initialize Textko.
$textko = new Textko\Textko($apiToken);

// Get list of messages.
$response = $textko->messages();

// Get response data.
$response->data();

```

## Get a Message

To get a message, use the `message($messageId)` function. The message id is required.

Example:
```php
<?php require_once 'vendor/autoload.php';

// Initialize Textko.
$textko = new Textko\Textko($apiToken);

// Get a message.
$messageId = 12345;
$response = $textko->message($messageId);

// Get response data.
$response->data();

```

## Delete a Message

To delete a message, use the `delete($messageId)` function. The message id is required.

Example:
```php
<?php require_once 'vendor/autoload.php';

// Initialize Textko.
$textko = new Textko\Textko($apiToken);

// Get a message.
$messageId = 12345;
$response = $textko->delete($messageId);

// Get response data.
$response->data();

```


## Response

Usually all API responses are in the form of a `Response` object.


### Response Methods

|   | Description|
|---|---|
| `messageId()` | Useful for getting message id after sending a message.  |
| `data()` | Get response data. Usually an object containing all data info.  |
| `httpCode()` | Get HTTP code.  |
| `responseCode()` | Get response code.  |
| `responseMsg()` | Get response msg.  |
| `toArray()` | Convert response to a array.  |
| `toJson()` | Convert response to a JSON string.  |

## REST API Documentation

To learn more about our REST API documentation.

See: [REST API Documentation](http://docs.textkoapiv2.apiary.io/)

## Need help?

Feel free to contact us. We are happy to assist.

**Email**: [hello@textko.com](mailto:hello@textko.com)

**Facebook**: [/textko](https://fb.com/textko)

**Twitter**: [@textko](https://twitter.com/textko)

**Chat**: [See our website](https://textko.com)