<?php

namespace Modules\Finance\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Modules\Finance\Traits\Response;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\RedirectResponse;



class StoreCompanyRequest extends FormRequest
{
    use Response;

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => ['required','string','max:80', Rule::unique('companies','name')],
            'description' => ['required','string','max:255'],
            'address' => ['required','string','max:191'],
            'logo' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }



    /**
     * @return void
     */
    protected function passedValidation(): void
    {
        if(!$this->validator->fails() and $this->hasSession())
            $this->session()->put('success', trans('finance::messages.success'));
    }


    /**
     * @param Validator $validator
     * @return RedirectResponse|mixed|void
     */
    protected function failedValidation(Validator $validator)
    {
        return $this->expectsJson() ? $this->errorResponse($validator->errors()->all()) : redirect()->back()->withErrors($validator);
    }
}
