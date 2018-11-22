<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cid'=>'required',
            'charges'=>'required',
            'subtotal'=>'required',
            'total'=>'required',
            'device_token'=>'required',
            'created'=>'required',
            'customer'=>[
                'name'=>'required',
                'email'=>'required',
                'contact'=>'required'
            ],
            'orders'=>[
                'orderNumber'=>'required',
                'truckName'=>'required',
                'created'=>'required',
                'items'=>[
                    'description'=>'required',
                    'display_name'=>'required',
                    'f_id'=>'required',
                    'p_id'=>'required',
                    'price'=>'required',
                    'quantity'=>'required',
                    'total'=>'required'
                ]
            ]
        ];
    }
}
