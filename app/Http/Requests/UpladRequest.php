<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;


class UpladRequest extends FormRequest
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
        $rules = [
            'title'=>'required',
            'description'=>'required',
            'price'=>'required',
            'product_count'=>'required',
            'weight'=>'required',
            // 'files'=>'sometimes',
            'category_id'=>'required',
        ];
        if (request('file_product')) {
    $photos = count(request('file_product'));
        foreach (range(0, $photos) as  $photo) {
            $rules['file_product.'.$photo]= v_image();
        }
            # code...
        }
    // dd($photos);

        return $rules;
    }
}
