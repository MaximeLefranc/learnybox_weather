<?php

namespace PhpTest\Controllers;

abstract class CoreController
{
    protected $match;
    protected $router;

    public function __construct($match, $router)
    {
        $this->match = $match;
        $this->router = $router;
    }

    /**
     * @param string $viewName Name of view file
     * @param array $viewData data array to give at view
     * @return void
     */
    protected function show(string $viewName, $viewData = [])
    {
        global $router;

        $viewData['currentPage'] = $viewName;

        $viewData['assetsBaseUri'] = $_SERVER['BASE_URI'] . 'assets/';

        $viewData['baseUri'] = $_SERVER['BASE_URI'];

        extract($viewData);

        require_once __DIR__ . '/../views/layout/header.tpl.php';
        require_once __DIR__ . '/../views/' . $viewName . '.tpl.php';
        require_once __DIR__ . '/../views/layout/footer.tpl.php';
    }
}
