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
            'weight'=>'required',
            // 'files'=>'sometimes',
            'category_id'=>'required',
        ];
    $photos = count(request('files'));
    // dd($photos);
        foreach (range(0, $photos) as  $photo) {
            $rules['files.'.$photo]= v_image();
        }
        return $rules;
    }
}
