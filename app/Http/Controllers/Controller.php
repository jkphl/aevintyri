<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /**
     * Return the current request
     *
     * @return \Illuminate\Http\Request     Request
     */
    protected function _request() {
        return app('request');
    }
}
