<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
{
    public function rules()
    {
        return [
            'term' => 'nullable|string',
            'type' => 'nullable|string',
            'limit' => 'nullable|integer'
        ];
    }
}
