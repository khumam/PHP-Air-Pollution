<?php

/**
 * AirPollution is a simple class to get Air Pollution information
 * 
 * @package AirPollutan
 * @author  Khoerul Umam <id.khoerulumam@gmail.com>
 * @version $Revision: 1.1 $
 * @access  public
 * 
 */

namespace AirPollution;

class AirPollution
{
    /**
     * Save API given by user
     * 
     */
    protected   $API;

    /**
     * Set the URI of API base
     */
    protected   $URI = 'http://api.waqi.info/feed/';

    /**
     * Save result in array
     */
    public      $resultArray;

    /**
     * Save result in json
     */
    public      $resultJson;

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
        if (json_decode($output, true)['status'] == 'error') {
            die('Unknown station');
        }
        return $output;
    }

    /**
     * Get result
     * 
     * @param string  $format   Get result format. Default is JSON.
     * @param boolean $readable Get result width readable format.
     * 
     * @return array
     */
    public function getResult($format = 'json', $readable = false)
    {
        if ($readable) {
            return $this->resultArray['data']['city']['name'] . ' at ' . $this->resultArray['data']['time']['s'] . ' with time zone ' . $this->resultArray['data']['time']['tz'] . ' is dominated by pollutants ' . $this->getDominant() . ' with an air quality index of ' . $this->getAqi() . '. Status ' . $this->getAboutAqi($this->getAqi());
        }
        if ($format == 'array') {
            return $this->resultArray;
        }
        return $this->resultJson;
    }

    /**
     * Get City
     * 
     * @param boolean $format     Get result data format. Default is JSON
     * @param boolean $readable   Get readable result
     * 
     * @return mixed
     */
    public function getCity($format = 'json', $readable = false)
    {
        $data = $this->resultArray['data']['city'];
        if ($readable) {
            return 'The city data that you enter is ' . $data['name'] . ' with coordinates [' . $data['geo'][0] . ', ' . $data['geo'][1] . ']';
        }
        if ($format == 'array') {
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
     * @param boolean $isIndividual Get data individually
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
     * @param string $pollutanType Get pollutan type
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

    /**
     * Get about Air Quality Index (AQI)
     * 
     * @param integer $aqi Air Quality Index
     * 
     * @return string
     */
    public function getAboutAqi($aqi = 0)
    {
        $result = [];
        if ($aqi >= 0 && $aqi <= 50) {
            $result['level'] = 'Good';
            $result['healthImplication'] = 'Air quality is considered satisfactory, and air pollution poses little or no risk';
            $result['pm25'] = 'None';
        } else if ($aqi >= 51 && $aqi <= 100) {
            $result['level'] = 'Moderate';
            $result['healthImplication'] = 'Air quality is acceptable; however, for some pollutants there may be a moderate health concern for a very small number of people who are unusually sensitive to air pollution';
            $result['pm25'] = 'Active children and adults, and people with respiratory disease, such as asthma, should limit prolonged outdoor exertion.';
        } else if ($aqi >= 101 && $aqi <= 150) {
            $result['level'] = 'Unhealthy for Sensitive Groups';
            $result['healthImplication'] = 'Members of sensitive groups may experience health effects. The general public is not likely to be affected';
            $result['pm25'] = 'Active children and adults, and people with respiratory disease, such as asthma, should limit prolonged outdoor exertion.';
        } else if ($aqi >= 151 && $aqi <= 200) {
            $result['level'] = 'Unhealthy';
            $result['healthImplication'] = 'Everyone may begin to experience health effects; members of sensitive groups may experience more serious health effects';
            $result['pm25'] = 'Active children and adults, and people with respiratory disease, such as asthma, should avoid prolonged outdoor exertion; everyone else, especially children, should limit prolonged outdoor exertion';
        } else if ($aqi >= 201 && $aqi <= 300) {
            $result['level'] = 'Very Unhealthy';
            $result['healthImplication'] = 'Health warnings of emergency conditions. The entire population is more likely to be affected';
            $result['pm25'] = 'Active children and adults, and people with respiratory disease, such as asthma, should avoid all outdoor exertion; everyone else, especially children, should limit outdoor exertion.';
        } else {
            $result['level'] = 'Hazardous';
            $result['healthImplication'] = 'Health alert: everyone may experience more serious health effects';
            $result['pm25'] = 'Everyone should avoid all outdoor exertion';
        }

        return implode('. ', $result);
    }
}
