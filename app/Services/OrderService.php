<?php 
namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class OrderService {
    

    public function get_order_by_id(Request $request) {
        //从数据库中获取数据
        $order_data = [
            'orderid'=>123,
            'mobile'=>'15866667777',
        ];
        $validator = Validator::make([],[]);
        if($request->input('mobile') != $order_data['mobile']) {
            $validator->errors()->add('mobile',"与订单手机号不匹配，来自service的校验");
            throw new ValidationException($validator);
        }
        if($request->input('name') != 'zhangsan') {
            $validator->errors()->add('name',"name校验不通过，你不是张三");
            throw new ValidationException($validator);
        }
    }

}