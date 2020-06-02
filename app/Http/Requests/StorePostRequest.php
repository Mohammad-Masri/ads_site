<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title'=>['required','max:50'],
            'text'=>['required','max:300'],
            'price'=>['required','numeric']
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'عنوان الإعلان مطلوب',
            'text.required'  => 'وصف الإعلان مطلوب',
            'price.required'  => 'سعر الإعلان مطلوب',
            'price.numeric'  => 'السعر يجب أن يكون رقم',
        ];
    }
}
