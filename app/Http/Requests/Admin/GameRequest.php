<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class GameRequest extends FormRequest
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
            'team1_id' => 'required',
            'team2_id' => 'required',
            'start_time' => 'required|date_format:Y-m-d H:i:s',
            'result1' => 'nullable',
            'result2' => 'nullable'
        ];
    }
}
