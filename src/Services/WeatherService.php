<?php

namespace PhpTest\Services;

use PhpTest\Models\City;
use Throwable;

/**
 * Class WeatherService
 *
 * Open Weather Api doc : https://openweathermap.org/api
 *
 * @package PhpTest
 */
class WeatherService
{
    /**
     * @var string
     */
    private string $apiKey;

    /**
     * @var string
     */
    private string $apiUrl;

    /**
     * @var string
     */
    private string $additionalParameters;

    /**
     * WeatherService constructor.
     * @param string $apiKey
     * @param string $apiUrl
     */
    public function __construct(string $apiKey = OPENWEATHER_API_KEY, string $apiUrl = 'https://api.openweathermap.org/data/2.5/', string $additionalParameters = '&lang=fr&units=metric')
    {
        $this->apiKey = $apiKey;
        $this->apiUrl = $apiUrl;
        $this->additionalParameters = $additionalParameters;
    }

    /**
     * @param string $cityName
     * @return object|false Weather object
     */
    public function getWeatherByCityName(string $city): object|false
    {
        $url = $this->getQueryUrl('q=' . $city);
        return $this->getWeather($url);
    }

    /**
     * @param float $long longitude
     * @param float $lat latitude
     * @return object|false Weather Object
     */
    public function getWeatherByCoordinates(float $long, float $lat): object|false
    {
        $url = $this->getQueryUrl('lat=' . $lat . '&lon=' . $long);
        return $this->getWeather($url);
    }

    /**
     * @param integer $cityId
     * @return object|false Weather Object 
     */
    public function getWeatherByCityId(int $cityId): object|false
    {
        $url = $this->getQueryUrl('id=' . $cityId);
        return $this->getWeather($url);
    }


    private function getQueryUrl(string $parameter): string
    {
        return $this->apiUrl . 'weather?' . $parameter . '&appid=' . $this->apiKey . $this->additionalParameters;
    }

    private function getWeather(string $url): object|false
    {
        $weather = false;
        try {
            $weather = json_decode(file_get_contents($url));
        } catch (Throwable $error) {
            echo $error->getMessage();
        }
        return $weather === null ? false : $weather;
    }
}
