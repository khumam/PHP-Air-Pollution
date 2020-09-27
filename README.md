## Wellcome to Air Pollution Information
---

Air pollution has become a serious problem these days. Several countries have been racing to create multiple systems to prevent further air pollution.

This library can help developers to get realtime data on air quality in various worlds of various types.

#### Installation
To install this library, make sure you have composer installed.

Run the following command

```
composer require khumam/air-pollution ^1.0
``` 

Then call the data with the code below

```php
<?php
require_once './vendor/autoload.php';

$get = new \AirPollution\AirPollution('API-KEY');
$get->searchByCity('Jakarta');
```

#### Available Method
1. `getResult($format)` Get all result. Default is JSON format, you can set to ARRAY.
2. `getCity($format)` Get city detail. Default is JSON format, also you can set to ARRAY.
3. `getDominant()` Get dominan pollutan.
4. `getAqi($pollutan)` Get Air Quality Index (AQI). Default is you can get all pollutan quality index, but you can also set spesific pollutan type. Available pollutan type `O3, PM10, PM25, UVI`
5. `getTime()` Get time.
6. `getForecast($pollutan)` You can get the next 7 days forecast of all pollutan, or you can spesific one.

#### API-KEY
You can get the API-KEY from [https://aqicn.org/](https://aqicn.org/api/). Register using your email.

#### Contributing
Yes, you can help optimize this library by contributing. All contributions are very meaningful to this library.
