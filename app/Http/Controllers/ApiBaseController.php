<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;

class ApiBaseController extends Controller
{

    /**
     * @override 
	 * @return array
	 */
    protected function formatValidationErrors(Validator $validator)
    {
        $msg = $validator->errors()->all();
        $error_msg = $this->api_result(1, $msg[0]);
        return $error_msg;
    }

    private function api_result($code,$msg) {
        $result = [
            'code'=>$code,
            'msg'=>$msg,
            'data'=>[],
        ];
        return $result;
    }
}
