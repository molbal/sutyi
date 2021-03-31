<?php

    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;
    use Illuminate\Support\Facades\Storage;

    class MakeBrainletRequest extends FormRequest {
        /**
         * Determine if the user is authorized to make this request.
         *
         * @return bool
         */
        public function authorize() {
            return true;
        }

        /**
         * Get the validation rules that apply to the request.
         *
         * @return array
         */
        public function rules() {
            return ['name' => ['required', 'max:256'],
                    'comment' => ['required', 'max:2048'],
                    'brainlet' => ['required',
                                   function ($attribute, $value, $fail) {
                                        if (!Storage::disk('local')
                                                    ->exists($value)) {

                                            $fail('The ' . $attribute . ' is invalid - no such brainlet.');
                                        }
                                     }
                                     ]
            ];
        }
    }
