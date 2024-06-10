<?php

namespace App\Http\Requests\BannerRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateBannerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        // ,'regex:/^[a-zA-Z0-9][a-zA-Z0-9]{1,61}[a-zA-Z0-9]\.[a-zA-Z]{2,}$/i'
        // 'dimensions:max_width=400,max_height=300',
        return [
            'title' => ['required'],
            'url' => ['nullable', 'min:5', 'max:200', 'url'],
            'status' => ['required', 'numeric'],
            'image_path' => ['required', 'image', 'mimes:png,jpg,jpeg,gif,webp', 'max:1999']
        ];
    }

    public function attributes()
    {
        return [
            'url' => 'آدرس تصویر',
        ];
    }

    public function messages()
    {
        return [
            'dimensions' => 'ابعاد تصویر باید 300 * 400 باشد.',
            'url.url' => 'https://www.site.com' . 'فرمت ادرس تصویر مثل',
        ];
    }
}
