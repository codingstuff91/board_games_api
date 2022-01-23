<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGameRequest extends FormRequest
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
            'name' => 'required',
            'number_of_players' => 'required',
            'minimum_age' => 'required',
            'game_duration_minimum' => 'required',
            'game_duration_maximum' => 'required',
            'release_year' => 'required'
        ];
    }
}