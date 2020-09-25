## Wellcome to Air Pollution Information
---

Air pollution has become a serious problem these days. Several countries have been racing to create multiple systems to prevent further air pollution.

This library can help developers to get realtime data on air quality in various worlds of various types.

#### Installation
To install this library, make sure you have composer installed.

Run the following command

```
composer require sahmura/air-pollution ^1.0
``` 

Then call the data with the code below

```php
<?php
require_once './vendor/autoload.php';

$get = new \AirPollution\AirPollution('API-KEY');
$get->searchByCity('Jakarta');
$get->getResult();  // result array
```

Result

```
Array
(
    [status] => ok
    [data] => Array
        (
            [aqi] => 55
            [idx] => 8647
            [attributions] => Array
                (
                    [0] => Array
                        (
                            [url] => http://www.bmkg.go.id/
                            [name] => BMKG | Badan Meteorologi, Klimatologi dan Geofisika
                            [logo] => Indonesia-Badan-Meteorologi-Klimatologi-dan-Geofisika.png
                        )

                    [1] => Array
                        (
                            [url] => https://waqi.info/
                            [name] => World Air Quality Index Project
                        )

                )

            [city] => Array
                (
                    [geo] => Array
                        (
                            [0] => -6.182536
                            [1] => 106.834236
                        )

                    [name] => Jakarta Central (US Consulate), Indonesia
                    [url] => https://aqicn.org/city/indonesia/jakarta/us-consulate/central
                )

            [dominentpol] => pm10
            [iaqi] => Array
                (
                    [dew] => Array
                        (
                            [v] => 21
                        )

                    [h] => Array
                        (
                            [v] => 69
                        )

                    [p] => Array
                        (
                            [v] => 1011
                        )

                    [pm10] => Array
                        (
                            [v] => 55
                        )

                    [pm25] => Array
                        (
                            [v] => 76
                        )

                    [t] => Array
                        (
                            [v] => 27
                        )

                    [w] => Array
                        (
                            [v] => 1.2
                        )

                )

            [time] => Array
                (
                    [s] => 2020-09-25 21:00:00
                    [tz] => +07:00
                    [v] => 1601067600
                    [iso] => 2020-09-25T21:00:00+07:00
                )

            [forecast] => Array
                (
                    [daily] => Array
                        (
                            [o3] => Array
                                (
                                    [0] => Array
                                        (
                                            [avg] => 32
                                            [day] => 2020-09-23
                                            [max] => 68
                                            [min] => 17
                                        )

                                    [1] => Array
                                        (
                                            [avg] => 25
                                            [day] => 2020-09-24
                                            [max] => 72
                                            [min] => 9
                                        )

                                    [2] => Array
                                        (
                                            [avg] => 33
                                            [day] => 2020-09-25
                                            [max] => 90
                                            [min] => 13
                                        )

                                    [3] => Array
                                        (
                                            [avg] => 42
                                            [day] => 2020-09-26
                                            [max] => 73
                                            [min] => 16
                                        )

                                    [4] => Array
                                        (
                                            [avg] => 57
                                            [day] => 2020-09-27
                                            [max] => 99
                                            [min] => 23
                                        )

                                    [5] => Array
                                        (
                                            [avg] => 70
                                            [day] => 2020-09-28
                                            [max] => 119
                                            [min] => 29
                                        )

                                    [6] => Array
                                        (
                                            [avg] => 35
                                            [day] => 2020-09-29
                                            [max] => 56
                                            [min] => 23
                                        )

                                )

                            [pm10] => Array
                                (
                                    [0] => Array
                                        (
                                            [avg] => 94
                                            [day] => 2020-09-23
                                            [max] => 148
                                            [min] => 56
                                        )

                                    [1] => Array
                                        (
                                            [avg] => 95
                                            [day] => 2020-09-24
                                            [max] => 122
                                            [min] => 65
                                        )

                                    [2] => Array
                                        (
                                            [avg] => 113
                                            [day] => 2020-09-25
                                            [max] => 151
                                            [min] => 75
                                        )

                                    [3] => Array
                                        (
                                            [avg] => 130
                                            [day] => 2020-09-26
                                            [max] => 162
                                            [min] => 98
                                        )

                                    [4] => Array
                                        (
                                            [avg] => 146
                                            [day] => 2020-09-27
                                            [max] => 165
                                            [min] => 123
                                        )

                                    [5] => Array
                                        (
                                            [avg] => 178
                                            [day] => 2020-09-28
                                            [max] => 199
                                            [min] => 154
                                        )

                                    [6] => Array
                                        (
                                            [avg] => 151
                                            [day] => 2020-09-29
                                            [max] => 200
                                            [min] => 122
                                        )

                                )

                            [pm25] => Array
                                (
                                    [0] => Array
                                        (
                                            [avg] => 176
                                            [day] => 2020-09-23
                                            [max] => 268
                                            [min] => 121
                                        )

                                    [1] => Array
                                        (
                                            [avg] => 180
                                            [day] => 2020-09-24
                                            [max] => 201
                                            [min] => 152
                                        )

                                    [2] => Array
                                        (
                                            [avg] => 212
                                            [day] => 2020-09-25
                                            [max] => 264
                                            [min] => 167
                                        )

                                    [3] => Array
                                        (
                                            [avg] => 230
                                            [day] => 2020-09-26
                                            [max] => 285
                                            [min] => 185
                                        )

                                    [4] => Array
                                        (
                                            [avg] => 266
                                            [day] => 2020-09-27
                                            [max] => 305
                                            [min] => 230
                                        )

                                    [5] => Array
                                        (
                                            [avg] => 324
                                            [day] => 2020-09-28
                                            [max] => 364
                                            [min] => 291
                                        )

                                    [6] => Array
                                        (
                                            [avg] => 268
                                            [day] => 2020-09-29
                                            [max] => 368
                                            [min] => 207
                                        )

                                )

                            [uvi] => Array
                                (
                                    [0] => Array
                                        (
                                            [avg] => 3
                                            [day] => 2020-09-23
                                            [max] => 11
                                            [min] => 0
                                        )

                                    [1] => Array
                                        (
                                            [avg] => 2
                                            [day] => 2020-09-24
                                            [max] => 9
                                            [min] => 0
                                        )

                                    [2] => Array
                                        (
                                            [avg] => 2
                                            [day] => 2020-09-25
                                            [max] => 9
                                            [min] => 0
                                        )

                                    [3] => Array
                                        (
                                            [avg] => 2
                                            [day] => 2020-09-26
                                            [max] => 8
                                            [min] => 0
                                        )

                                    [4] => Array
                                        (
                                            [avg] => 2
                                            [day] => 2020-09-27
                                            [max] => 9
                                            [min] => 0
                                        )

                                    [5] => Array
                                        (
                                            [avg] => 2
                                            [day] => 2020-09-28
                                            [max] => 8
                                            [min] => 0
                                        )

                                    [6] => Array
                                        (
                                            [avg] => 2
                                            [day] => 2020-09-29
                                            [max] => 8
                                            [min] => 0
                                        )

                                    [7] => Array
                                        (
                                            [avg] => 0
                                            [day] => 2020-09-30
                                            [max] => 1
                                            [min] => 0
                                        )

                                )

                        )

                )

            [debug] => Array
                (
                    [sync] => 2020-09-26T00:27:00+09:00
                )

        )

)
```

#### API-KEY
You can get the API-KEY from [https://aqicn.org/](https://aqicn.org/api/). Register using your email.

#### Contributing
Yes, you can help optimize this library by contributing. All contributions are very meaningful to this library.
