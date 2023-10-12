<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

class UserController extends BaseController
{

    /**
     * fix: Unable to prepare route [api/user] for serialization. Uses Closure.
     */
    public function AuthRouteAPI(Request $request){
        return $request->user();
    }

}
