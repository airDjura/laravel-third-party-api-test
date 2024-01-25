<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class GetFlightSchedulesRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'flight_number' => 'required|string|max:8',
            'departure_date' => 'required|date_format:Y-m-d',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
