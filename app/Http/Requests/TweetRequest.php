<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TweetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
//        echo $this->path();
//        return true;
        if (preg_match("/tweeter/", $this->path())) {
            return true;
        } else {
            return false;
        }
    }

        /**
         * Get the validation rules that apply to the request.
         *
         * @return array
         */
        public
        function rules()
        {
            return [
                'message' => 'required'
            ];
        }

        public
        function messages()
        {
            return [
                'message.required' => '何か入力してください。'
            ];
        }
    }
