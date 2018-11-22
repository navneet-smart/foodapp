<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FoodTruckRequest extends FormRequest
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
            'owner_id'=>'required|unique:food_trucks,user_id',
            'display_name'=>'required|max:255|unique:food_trucks',
            'device_token'=>'required|max:255',
        ];
    }
}
