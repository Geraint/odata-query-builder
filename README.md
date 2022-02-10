# OData Query Builder for PHP
 
![Build and Test](https://github.com/Geraint/odata-query-builder/actions/workflows/build-and-test.yml/badge.svg)

This is basic query builder with a [fluent interface](https://en.wikipedia.org/wiki/Fluent_interface) for constructing [OData](https://en.wikipedia.org/wiki/Open_Data_Protocol) URL's.

It is not intended to be a full implementation nor is it currently recommended for production use.

## Example Usage

### Using `build()`

This should be called last, and will return an encoded URL:

```php
<?php

use ODataQueryBuilder\ODataQueryBuilder;

$serviceRootUrl = 'https://services.odata.org/V4/TripPinService/';
$resourcePath = 'People';
$builder = new ODataQueryBuilder($serviceRootUrl, $resourcePath);
$query = $builder->build();
```

`$query` should now contain the following:

```
https://services.odata.org/V4/TripPinService/People
```

You can include an entity ID in the resource path to get a URL for a single entity:
```php
<?php

use ODataQueryBuilder\ODataQueryBuilder;

$serviceRootUrl = 'https://services.odata.org/V4/TripPinService/';
$resourcePath = "People('russelwhyte')";
$builder = new ODataQueryBuilder($serviceRootUrl, $resourcePath);
$query = $builder->build();
```

`$query` should now contain the following:

```
https://services.odata.org/V4/TripPinService/People('russelwhyte')
```

### Using `filter()` and `format()`

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

### Using `expand()`

This is a very basic implementation.  If you try to do anything more advanced than just specifying a single related resource, you'll get URL encoding errors.

```php
<?php

use ODataQueryBuilder\ODataQueryBuilder;

$builder = new ODataQueryBuilder("https://services.odata.org/V4/TripPinService/", "People('russelwhyte')");
$query = $builder
    ->expand('Friends')
    ->build();
```
    
`$query` should now contain the following:

```
https://services.odata.org/V4/TripPinService/People('russelwhyte')?$expand=Friends
```

### Using `select()`

```php
<?php

use ODataQueryBuilder\ODataQueryBuilder;

$builder = new ODataQueryBuilder("https://services.odata.org/V4/TripPinService/", 'Airports');
$query = $builder
    ->select('Name, IcaoCode')
    ->build();
```
    
`$query` should now contain the following:

```
https://services.odata.org/V4/TripPinService/Airports?$select=Name%2C%20IcaoCode
```

### Using `orderBy()`

```php
<?php

use ODataQueryBuilder\ODataQueryBuilder;

$builder = new ODataQueryBuilder("https://services.odata.org/V4/TripPinService/", 'Airports');
$query = $builder
    ->orderBy('Name desc')
    ->build();
```
    
`$query` should now contain the following:

```
https://services.odata.org/V4/TripPinService/Airports?$orderby=Name%20desc
```

### Using `top()` and `skip()`

```php
<?php

use ODataQueryBuilder\ODataQueryBuilder;

$builder = new ODataQueryBuilder("https://services.odata.org/V4/TripPinService/", 'People');
$query = $builder
    ->top(5)
    ->skip(10)
    ->build();
```
    
`$query` should now contain the following:

```
https://services.odata.org/V4/TripPinService/People?$top=5&$skip=10
```

### Using `count()`

```php
<?php

use ODataQueryBuilder\ODataQueryBuilder;

$builder = new ODataQueryBuilder("https://services.odata.org/V4/TripPinService/", 'People');
$query = $builder
    ->count(true)
    ->build();
```
    
`$query` should now contain the following:

```
https://services.odata.org/V4/TripPinService/People?$count=true
```


## License

See the [LICENSE](LICENSE.md) file for license rights and limitations (GNU GPLv3).

## Alternatives

- [PHP-OData-Query-Builder](https://github.com/rob893/PHP-OData-Query-Builder)
- [OData Client for PHP](https://github.com/saintsystems/odata-client-php)
