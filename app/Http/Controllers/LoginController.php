<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Validations;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginAccess(Request $request)
    {
        // dd($request->all());
        $returnValidate = Validations::validation(__FUNCTION__, $request);
        if ($returnValidate !== true) {
            return $returnValidate;
        }
        dd($request->all());
    }

    public function forgotPassword()
    {
    }
}
