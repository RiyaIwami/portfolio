<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'category' => ['required', 'integer', 'exists:categories,id'],
            'visit_status' => ['required', 'string', 'exists:visit_statuses,id'],
            'score_id' => ['required', 'integer', 'exists:scores,id'],
            'review' => ['nullable', 'string', 'max:255'],
            'image'  => ['nullable', 'file', 'image'],
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => '店名',
            'category' => 'カテゴリ',
            'visit_status' => '訪問状況',
            'score' => '点数',
            'review' => '感想',
            'image'  => '画像',
        ];
    }
}
