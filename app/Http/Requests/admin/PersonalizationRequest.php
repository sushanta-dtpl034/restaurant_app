<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class PersonalizationRequest extends FormRequest
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
        // To identify if a request is for store or update
        $id = $this->route('personalization.id') ?: 'NULL';
        return [
            'name' => 'required|unique:personalizations,name,' . $id,
            'type' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'options' => 'required_if:type,'.implode(',',array_diff(personalizationFieldType(), ['Textbox','Textarea']))
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'type.required' => 'Field type is required.',
            'name.required' => 'Field name is required.',
            'image.image' => 'The image must be a file of type: jpeg, png, gif, svg.'
        ];
    }
}
