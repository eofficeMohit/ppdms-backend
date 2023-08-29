<?php

namespace App\Http\Requests\Register;

use Illuminate\Http\Request;

class ValidateMobileRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
         /* Validate Login Data */
        $validator = Validator::make($request->all(), [
            'mobile_number' => 'required|numeric|digits:10'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        return true;
    }
}
