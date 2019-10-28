# Namesilo PHP Client

This is a simple PHP client for the Namesilo API. Documentation can be found on the [Namesilo website](https://www.namesilo.com/api_reference.php).

## Installation
```bash
composer require pauladams/namesilo
```

## Usage
* The client takes two parameters, your Namesilo API key (required) and the API url (optional).
  * By default, the API url is `https://www.namesilo.com/api` but this can be changed to the sandbox URL, which is `http://sandbox.namesilo.com/api`.
* The method names for this client are identical to the endpoint names in the documentation. All methods take a single array, which should contain the parameters listed in the documentation.
* A `Response` object is returned. The `getData()` method will return the API response data. Also included are some helper methods which can be used to obtain common information, such as `getCode()` and `getMessage()`. `isSuccessful()` will indicate whether the request was successful.

## Example
```php
<?php

use PaulAdams\Namesilo\Client;

$client = new Client('my-api-key');

$response = $client->registerDomain([
    'domain' => 'example.com',
    'years' => 1,
]);

if ($response->isSuccessful()) {
  $data = $response->getData();

  $domain = $data->domain;

  // etc...
} else {
  $message = $response->getMessage();

  // handle the error
}
```

## Contributions
Please submit a PR if there's anything you'd like to add. I haven't gotten round to writing tests yet, so that would be greatly appreciated.