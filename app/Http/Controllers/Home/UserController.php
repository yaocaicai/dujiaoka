<?php

namespace App\Http\Controllers\Home;

class UserController extends BaseController
{

    /**
     * fix: Unable to prepare route [api/user] for serialization. Uses Closure.
     */
    public function AuthRouteAPI(Request $request){
        return $request->user();
    }

}
