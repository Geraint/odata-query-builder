# OData Query Builder for PHP
 
![Build and Test](https://github.com/Geraint/odata-query-builder/actions/workflows/build-and-test.yml/badge.svg)

This is basic query builder with a [fluent interface](https://en.wikipedia.org/wiki/Fluent_interface) for constructing [OData](https://en.wikipedia.org/wiki/Open_Data_Protocol) URL's.

It is not intended to be a full implementation but, if your needs are modest, then it could be a good fit for your project.

## Install

```
composer require geraint/odata-query-builder:dev-master
```

## Example

```php
<?php

use ODataQueryBuilder\ODataQueryBuilder;

$serviceRootUrl = 'https://services.odata.org/V4/TripPinService/';
$resourcePath = 'People';
$builder = new ODataQueryBuilder($serviceRootUrl, $resourcePath);
$query = $builder
    ->filter("FirstName eq 'Scott'")
    ->select('UserName, LastName, FirstName')
    ->orderBy('LastName asc')
    ->format('json')
    ->build();
```

`$query` should now contain the following:

```
https://services.odata.org/V4/TripPinService/People?$filter=FirstName%20eq%20%27Scott%27&$select=UserName%2C%20LastName%2C%20FirstName&$orderby=LastName%20asc&$format=json
```

See [doc/methods.md](doc/methods.md) for more info.

## License

See the [LICENSE](LICENSE.md) file for license rights and limitations (GNU GPLv3).

## Alternatives

- [PHP-OData-Query-Builder](https://github.com/rob893/PHP-OData-Query-Builder)
- [OData Client for PHP](https://github.com/saintsystems/odata-client-php)
