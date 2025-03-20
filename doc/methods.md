# Methods

## Using `build()`

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

## Using `filter()`

```php
<?php

use ODataQueryBuilder\ODataQueryBuilder;

$builder = new ODataQueryBuilder("https://services.odata.org/V4/TripPinService/", 'People');
$query = $builder
    ->filter("FirstName eq 'Scott'")
    ->build();
```
    
`$query` should now contain the following:

```
https://services.odata.org/V4/TripPinService/People?$filter=FirstName%20eq%20%27Scott%27
```

## Using `expand()`

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

## Using `select()`

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

## Using `orderBy()`

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

## Using `top()` and `skip()`

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

## Using `count()`

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

## Using `search()`

```php
<?php

use ODataQueryBuilder\ODataQueryBuilder;

$builder = new ODataQueryBuilder("https://services.odata.org/V4/TripPinService/", 'People');
$query = $builder
    ->search('United States')
    ->build();
```
    
`$query` should now contain the following:

```
https://services.odata.org/V4/TripPinService/People?$search=United%20States
```

## Using `format()`

```php
<?php

use ODataQueryBuilder\ODataQueryBuilder;

$builder = new ODataQueryBuilder("https://services.odata.org/V4/TripPinService/", 'People');
$query = $builder
    ->format('json')
    ->build();
```
    
`$query` should now contain the following:

```
https://services.odata.org/V4/TripPinService/People?$format=json
```

## Using `$first` and `$after`

[Azure Data API Builder](https://learn.microsoft.com/en-gb/azure/data-api-builder/)'s REST endpoints uses:

- `$first` instead of `$top`
- `$after` instead of `$skip`

([documentation](https://learn.microsoft.com/en-gb/azure/data-api-builder/rest#first-and-after)).

You can do this:

```php
<?php

use ODataQueryBuilder\ODataQueryBuilder;

$builder = new ODataQueryBuilder("https://services.odata.org/V4/TripPinService/", 'People');
$query = $builder
    ->first(5)
    ->after(10)
    ->build();
```
    
`$query` should now contain the following:

```
https://services.odata.org/V4/TripPinService/People?$first=5&$after=10
```
