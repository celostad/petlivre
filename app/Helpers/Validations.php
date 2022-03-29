<?php
namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Validations
{

    /**
     * @param $method
     * @param Request $request
     * @return bool|\Illuminate\Http\JsonResponse
     */
    public static function validation($method, Request $request)
    {
        $data = $request->only(['email', 'pass']);

        if (empty($data)) {
            return response()->json('the attributes are required', 400);
        }

        $validator = Validator::make($data, self::getRules($method), self::getMessages($method));

        if ($validator->passes()) {
            return true;
        } else {
            return response()->json($validator->errors()->all(), 400);
        }
    }

    /**
     * @param $method
     * @return array
     */
    private static function getRules($method)
    {
        // dd($method);
        switch ($method) {
            case 'loginAccess':
                return [
                    'email' =>  'required|email',
                    'pass' =>   'required|string|min:6',
                ];
            }
    }

    /**
     * @param $method
     * @return array
     */
    private static function getMessages($method)
    {
        switch ($method) {
            case 'loginAccess':
                return [
                    'email.required' => 'the email field is required',
                    'pass.required' =>  'the value of the password field is required'
                ];
            }
    }
}
