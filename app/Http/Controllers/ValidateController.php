<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckMobile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ValidateController extends Controller
{
    //简单的验证 
    public function simple_check(Request $request) {
        $validatedData = $request->validate([
            'mobile' => 'required',
        ]);
        return 'check 成功';
    }

    /**
     * 复杂的验证
     *
     * @return void
     */
    public function complex_check(Request $request,CheckMobile $checkMobile) {
        // Retrieve the validated input data...
        return 'check 成功';
    }
}
