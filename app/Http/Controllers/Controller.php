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

    /**
     * Return an error
     *
     * @param int $status                   HTTP status code
     * @param string $message               Error description
     * @return \Symfony\Component\HttpFoundation\Response       Response
     */
    protected function error($status, $message)
    {
        return response()->json(array(
            'success' => false,
            'status' => $status,
            'description' => $message,
        ), $status);
    }
}
