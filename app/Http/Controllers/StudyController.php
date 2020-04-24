<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;

class StudyController extends Controller
{
    public function get_list(Request $request) {
        return 'hello,study controller';
    }

    public function check(Request $request) {
        $validatedData = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);
        return 'xx';
        $this->validate_apply($request);
        return 'store 成功';
    }

    protected function validate_apply(Request $request) {
		$rules = [
			'product_id'=>'required|exists:boos_products,id',
		];	
		$message = [
			'product_id.required'=>'请选择贷款产品',
			'product_id.exists'=>'无效的贷款产品',
		];
		// return $this->validate($request,$rules,$message);
    }
    
    /**
	 * @return array
	 */
    // protected function formatValidationErrors(Validator $validator)
    // {
    //     $msg = $validator->errors()->all();
    //     return $msg;
	// 	// $error_msg = api_result(1,array_first($msg));
    //     // return $error_msg;
    // }
}
