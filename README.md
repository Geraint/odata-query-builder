# OData Query Builder
 
![Build and Test](https://github.com/Geraint/odata-query-builder/actions/workflows/build-and-test.yml/badge.svg)

This is basic query builder for constructing OData URL's.

It is not intended to be a full implementation nor is it currently recommended for production use.

## Example Usage

```php
<?php

use ODataQueryBuilder\ODataQueryBuilder;

$builder = new ODataQueryBuilder("https://services.odata.org/V4/TripPinService/", 'People');
$query = $builder
    ->filter("FirstName eq 'Scott'")
    ->format('json')
    ->build();
```
    
`$query` should now contain the following:

```
https://services.odata.org/V4/TripPinService/People?$filter=FirstName%20eq%20%27Scott%27&$format=json
```

## License

See the [LICENSE](LICENSE.md) file for license rights and limitations (GNU GPLv3).

## Alternatives

- [PHP-OData-Query-Builder](https://github.com/rob893/PHP-OData-Query-Builder)
- [OData Client for PHP](https://github.com/saintsystems/odata-client-php)
