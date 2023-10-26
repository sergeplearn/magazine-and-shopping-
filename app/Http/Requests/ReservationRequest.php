<?php

namespace App\Http\Requests;

use App\Rules\DateBetween;
use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
            'message' => ['sometimes'],
            'date' => ['required','date',new DateBetween()],
            'first_name'=>['required'],
            'second_name'=>['required'],
            'timeinterval_id'=>['required'],
            'tell'=>'required|phone:AUTO,CMR',
        ];
    }
    public function messages(): array
    {
        return [
            'first_name.required' => 'first name is required',
            'second_name.required' => 'second name  is required',
            'tell.required' => 'a phone number is required',
            'tell.phone'=>'Enter in this format: +237 and then phone number'
        ];
    }
}
