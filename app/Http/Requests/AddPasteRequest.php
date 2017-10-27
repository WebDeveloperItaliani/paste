<?php

namespace Wdi\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Wdi\Entities\Language;

/**
 * Class AddPasteRequest
 *
 * @package Wdi\Http\Requests
 */
final class AddPasteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() : bool
    {
        return true;
    }
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            "name" => [
                "required",
                "min:3",
            ],
            "code" => [
                "required"
            ],
            "language_id" => [
                "required",
                Rule::exists(Language::TABLE_NAME, "id")
            ],
        ];
    }
}
