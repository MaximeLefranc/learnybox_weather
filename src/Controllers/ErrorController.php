<?php

namespace PhpTest\Controllers;

use PhpTest\Controllers\CoreController;

class ErrorController extends CoreController
{
    /**
     * @return void
     */
    public function err404()
    {
        header('HTTP/1.0 404 Not Found');

        $this->show('error/err404');
    }
}
