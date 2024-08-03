<?php

namespace PhpTest\Controllers;

use PhpTest\Controllers\CoreController;
use PhpTest\Services\WeatherService;
use Throwable;

class MainController extends CoreController
{
    private WeatherService $weatherService;

    public function __construct()
    {
        $this->weatherService = new WeatherService();
    }

    public function home()
    {
        $error = $_GET['error'] ?? null;
        return $this->show('home/home', [
            'error' => $error,
        ]);
    }

    public function weatherByCity()
    {
        $city = $_GET['city'];
        $weather = $this->weatherService->getWeatherByCityName($city);

        if (!$weather) {
            $this->displayErrorMsg('la ville ' . $city . ' n\'existe pas');
        }

        $this->show('weather/weather', [
            'weather' => $weather,
        ]);
    }

    public function weatherByCoordinates()
    {
        $lat = $_GET['lat'];
        $lon = $_GET['lon'];

        if (!$lat || !$lon || !is_numeric($lat) || !is_numeric($lon)) {
            $this->displayErrorMsg('Veuillez entrer une longitude et une latitude valide. Exemple: 123.70');
        }

        $lat = floatval($lat);
        $lon = floatval($lon);
        $weather = $this->weatherService->getWeatherByCoordinates($lon, $lat);

        if (!$weather) {
            $this->displayErrorMsg('Aucune ville dans notre base pour la longitude: ' . $lon . ' et la latitude: ' . $lat);
        }

        $this->show('weather/weather', [
            'weather' => $weather,
        ]);
    }

    public function weatherByCityId()
    {
        $cityId = $_GET['cityId'];

        if (!$cityId || !is_numeric($cityId)) {
            $this->displayErrorMsg('Veuillez entrer un identifiant de ville valide.');
        }

        $cityId = intval($cityId);
        $weather = $this->weatherService->getWeatherByCityId($cityId);

        if (!$weather) {
            $this->displayErrorMsg('Aucune ville dans notre base possède l\'identifiant: ' . $cityId);
        }

        $this->show('weather/weather', [
            'weather' => $weather,
        ]);
    }

    private function displayErrorMsg($msg)
    {
        header('Location: /error?error=' . $msg);
    }
}
