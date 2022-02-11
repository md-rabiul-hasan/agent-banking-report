<?php

namespace App\Http\Requests\ParameterSetup\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Indicates if the validator should stop on the first rule failure.
     *
     * @var bool
     */
    protected $stopOnFirstFailure = true;

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
            'name'                      => 'required',
            'email'                     => 'required|email',
            'user_login_id'             => 'required|unique:users',
            'role_id'                   => 'required',
            'user_type'                 => 'required',
            'branch_id'                 => 'required',
            'debit_power'               => 'required',
            'credit_power'              => 'required',
            'cash_debit_passing_power'  => 'required',
            'cash_credit_passing_power' => 'required',
        ];
    }


    /**
     * Return error message
     *
     * @return array
     */

    public function messages()
    {
        return [
            'user_login_id.unique' => 'This mobile no already exist'
        ];
    }
}
