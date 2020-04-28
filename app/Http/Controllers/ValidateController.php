<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckMobile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

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
        $order_service = new \App\Services\OrderService();
        $order_service->get_order_by_id($request);
        return 'check 成功';
    }

    /**
     * Validate instance 对象处理方式
     *
     * @return void
     */
    public function obj_check(Request $request) {
        $rules = [//校验规则
            'mobile' => 'bail|required|digits:11',//必填且为11为数字
            'name' => 'required',
        ];
        $error_msg = [//错误信息,校验不通过
            'mobile.required' => '手机号必填',
            'mobile.digits' => '手机号长度不正确',
            'name.required' => '姓名必填',
        ];
        $input_data = [//要校验的数据
            'mobile' => $request->input('mobile'),
            'name'=> 'zhangsan',
        ];
        // $input_data = $request->all();
        $validate = Validator::make($input_data,$rules,$error_msg);
        $validate->validate();

        //或者用下面的形式
        // if($validate->fails()) {
        //     return '校验失败';
        // }

        if($request->input("mobile") != '15899997777') {
            $validate->errors()->add('telephone','与订单手机号不匹配');
            throw new ValidationException($validate);
        }
        //do something
        // $validate->after(function($validate) use($request){
        //     //其他验证，比如 查询手机号和订单手机号不一致
        //     if($request->input("mobile") != '15899997777') {
        //         $validate->errors()->add('mobile', '与订单手机号不匹配');
        //     }
        // });
        echo 'hello';

        return 'check 成功';
    }
}
