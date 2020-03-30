<?php
/**
 * Created by PhpStorm.
 * User: local
 * Date: 22.04.2019
 * Time: 22:23
 */

class NovaposhtaAPI
{
    private $apiKey = '75a92ccc3292458fd80aa90728dbc1de';
    /**
     * @var NovaposhtaAPI
     */
    private static $instance;

    /**
     * @return NovaposhtaAPI
     */
    public static function getInstance() 
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }


    public function getCities()
    {
        if (!isset($_SESSION['NPgetCities'])) {
            $data = ['apiKey' => $this->apiKey, 'modelName' => 'Address', 'calledMethod' => 'getCities'];
            $data_string = json_encode($data);

            $ch = curl_init('https://api.novaposhta.ua/v2.0/json/');
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($data_string))
            );

            $result = curl_exec($ch);
            $result = json_decode($result);

            if ($result->success) {
                $cities = [];

                foreach ($result->data as $city) {
                    $cities[$city->DescriptionRu] = $city->DescriptionRu;
                }
            }

            $_SESSION['NPgetCities'] = $cities;
        }


        return $_SESSION['NPgetCities'];
    }

    public function getWarehouses($cityName)
    {
        $data = [
            'apiKey' => $this->apiKey,
            'modelName' => 'AddressGeneral',
            'calledMethod' => 'getWarehouses',
            'methodProperties' => [
                'Language' => 'ru',
                'CityName' => $cityName,
            ]
        ];
        $data_string = json_encode($data);

        $ch = curl_init('https://api.novaposhta.ua/v2.0/json/');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data_string))
        );

        $result = curl_exec($ch);
        $result = json_decode($result);

        if ($result->success) {
            $warehouses = [];

            foreach ($result->data as $city) {
                $warehouses[$city->DescriptionRu] = $city->DescriptionRu;
            }
        }

        return $warehouses;
    }

    /**
     * is not allowed to call from outside to prevent from creating multiple instances,
     * to use the singleton, you have to obtain the instance from Singleton::getInstance() instead
     */
    private function __construct()
    {
        if (!session_id())
            session_start();
    }

    /**
     * prevent the instance from being cloned (which would create a second instance of it)
     */
    private function __clone()
    {
    }

    /**
     * prevent from being unserialized (which would create a second instance of it)
     */
    private function __wakeup()
    {
    }
}