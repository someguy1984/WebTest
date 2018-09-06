<?php

    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;

    class MonataryForm extends FormRequest
    {
        public $validator = null;

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
           $rules = [
                'value' => ['required', 'regex:/((^\£\d+\.?\d+p?$)|^(?!x)(\d+p)$|^\d+\.\d+$|^\d+$)$/u'],
            ];

            return $rules;
        }

        public function messages()
        {
            return [
                'value.regex' => 'Please ensure your value is written in pounds or pence for example: £3.53 or 123p.',
                'value.required' => 'Please ensure your value is written in pounds or pence for example: £3.53 or 123p.',
            ];
        }

    }
