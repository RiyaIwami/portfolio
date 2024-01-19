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
            'category' => ['required', 'integer'],
            'visit_status' => ['required', 'integer'],
            'score_id' => ['required', 'integer'],
            'review' => ['required', 'text'],
        ];
    }

    public function attributes()
    {
        return [
            'name'=> '店名',
            'category' => 'カテゴリ',
            'visit_status' => '訪問状況',
            'score_id' => '点数',
            'review' => '感想',
        ];
    }
}
