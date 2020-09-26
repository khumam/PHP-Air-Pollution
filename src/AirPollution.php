<?php

/**
 * Get Air Pollution information
 * 
 * 
 * @author Khoerul Umam <id.khoerulumam@gmail.com>
 */

namespace AirPollution;

class AirPollution
{
    protected $API;
    protected $URI = 'http://api.waqi.info/feed/';
    public $resultArray;
    public $resultJson;
    public $cityDetail;

    /**
     * Init data
     * 
     * @param string $API Api code
     * 
     * @return mixed
     */
    public function __construct($API)
    {
        $this->API = $API;
    }

    /**
     * Get Air Pollution data by city
     *
     * @param string $cityName City name
     *
     * @return mixed
     */
    public function searchByCity($cityName)
    {
        $data['city'] = $cityName;
        $getData = $this->_getData($data);
        $this->resultJson = $getData;
        $this->resultArray = json_decode($getData, true);
    }

    /**
     * Get data
     * 
     * @param array $data Perform data
     * 
     * @return json
     */
    private function _getData($data = [])
    {
        $curl = curl_init();
        curl_setopt(
            $curl,
            CURLOPT_URL,
            $this->URI . $data['city'] . '/?token=' . $this->API
        );
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        return $output;
    }

    /**
     * Get result
     * 
     * @param $type Get result type. Default is JSON
     * 
     * @return array
     */
    public function getResult($type = 'json')
    {
        if ($type == 'array') {
            return $this->resultArray;
        }
        return $this->resultJson;
    }

    /**
     * Get City
     * 
     * @param boolean $type     get result data type. Default is JSON
     * @param boolean $readable get readable result
     * 
     * @return mixed
     */
    public function getCity($type = 'json', $readable = false)
    {
        $data = $this->resultArray['data']['city'];
        if ($type == 'array') {
            return $data;
        }
        return json_encode($data);
    }

    /**
     * Get dominant pollution
     * 
     * @return string
     */
    public function getDominant()
    {
        return $this->resultArray['data']['dominentpol'];
    }

    /**
     * Get air quality index
     * 
     * @param boolean $isIndividual get data individually
     * 
     * @return array
     */
    public function getAqi($isIndividual = false)
    {
        if ($isIndividual) {
            return $this->resultArray['data']['iaqi'];
        }
        return $this->resultArray['data']['aqi'];
    }

    /**
     * Get Time
     * 
     * @return array
     */
    public function getTime()
    {
        return $this->resultArray['data']['time'];
    }

    /**
     * Get forecast
     * 
     * @param string $pollutanType get pollutan type
     * 
     * @return array
     */
    public function getForecast($pollutanType = null)
    {
        if ($pollutanType == null) {
            return $this->resultArray['data']['forecast']['daily'];
        } else {
            return $this->resultArray['data']['forecast']['daily'][$pollutanType];
        }
    }
}
