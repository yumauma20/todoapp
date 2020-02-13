<?php

namespace App\Http\Requests;

use App\Folder;
use Illuminate\Foundation\Http\FormRequest;

class EditFolder extends FormRequest
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
            'title' => 'required|string|max:20',
        ];
    }

    public function attributes()
    {
    return [
        'title' => 'タイトル名',
    ];
    }
}
