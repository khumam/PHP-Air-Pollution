<?php

 /**
 * Get Air Pollution information
 * 
 * 
 * @author Khoerul Umam <id.khoerulumam@gmail.com>
 */

namespace AirPollution;

class AirPollution {
    private $API;
    protected $URI = 'http://api.waqi.info/feed/';
    public $result = array();

    /**
     * Init data
     * 
     * @param string $API Api code
     * 
     * @return mixed
     */
    public function __construct($API)
    {
        $this->$API = $API;
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
        $result = json_decode($this->_getData($data), true);
        $this->result = $result;
    }

    /**
     * Get data
     * 
     * @param array $data Perform data
     * 
     * @return json
     */
    private function _getData($data)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $this->URI . $data['city'] . '/?token=' . $this->API);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
        $output = curl_exec($curl); 
        curl_close($curl);
        return $output;
    }

    /**
     * Get result
     * 
     * @return array
     */
    public function getResult()
    {
        print_r($this->result);
    }
}