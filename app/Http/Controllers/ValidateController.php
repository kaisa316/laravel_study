<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckMobile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    /**
     * Validate instance 对象处理方式
     *
     * @return void
     */
    public function obj_check(Request $request) {
        $rules = [//校验规则
            'mobile' => 'required|digits:11',
            'name' => 'required',
        ];
        $error_msg = [//校验不通过，错误信息
            'mobile.required' => '手机号必填',
            'mobile.digits' => '手机号长度不正确',
            'name.required' => '姓名必填',
        ];
        $input_data = [//要校验的数据
            'mobile' => '158xxx',
            // 'name'=> 'zhangsan',
        ];
        // $input_data = $request->all();
        $validate = Validator::make($input_data,$rules,$error_msg);
        $validate->validate();

        //或者用下面的形式
        // if($validate->fails()) {
        //     return '校验失败';
        // }

        return 'check 成功';
    }
}
