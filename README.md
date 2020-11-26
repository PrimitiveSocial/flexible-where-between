
[![Latest Version on Packagist](https://img.shields.io/packagist/v/primitive/flexible-where-between.svg?style=flat-square)](https://packagist.org/packages/primitive/flexible-where-between)
[![Total Downloads](https://img.shields.io/packagist/dt/primitives/flexible-where-between.svg?style=flat-square)](https://packagist.org/packages/primitive/flexible-where-between)

![image](https://user-images.githubusercontent.com/13042804/97702236-a4ea0880-1a7c-11eb-940a-ee99796f6044.png)


We created this package to avoid duplication of code accross projects when using [Laravel's](https://laravel.com) `whereBetween` method.  

For example, if you are looking for "something" between two dates, your method without this package would need to look like:

``` php
$logs = Log::query();

if ((empty($end_date) && (empty($start_date))
{
    $logs = $logs->get();
}

else if (empty($end_date)) 
{
   $logs = $logs->where('created_at','>=', $start_date);
}
else if (empty($start_date)) 
{
   $logs = $logs->where('created_at','<=', $end_date);
} 
else 
{
   $logs = $logs->whereBetween('created_at', [$start_date, $end_date])
}

```

This package takes care of that logic for you.  Your new method would look like:


``` php
Log::whereBetween('created_at', [$start_date, $end_date])

```
So, regardless of whether `$start_date` or `$end_date` is `NULL` or has a value, it will "just work".


## Installation

You can install the package via composer:

```bash
composer require primitive/flexible-where-between
```

## Usage

After the package is installed, a `macro` is registered that overrides the default `whereBetween` functionality.  So, it just works. :) 

## Credits

- [Primitive](https://github.com/primitivesocial)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
