<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \App\Http\LaravelIntegration;
use JWTAuth;

class ApiController extends Controller
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        if(env('AUTH_PROTECT_API', true)) {
            $this->middleware('jwt.auth');
        }

        //CRZ: this allows ALL unrecognized params, even ones that break jsonapi spec.
        //     http://jsonapi.org/format/#query-parameters
        //     need it for ?Q= in index routes
        $this->allowUnrecognizedParams = true;

        $this->allowedFilteringParameters = null;
        $this->allowedIncludePaths = null;

    }

}
