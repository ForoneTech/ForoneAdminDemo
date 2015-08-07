<?php namespace App\Http\Requests;

class UpdateTagRequest extends Request
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
            'name'          => 'required|max:50',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '标签名称不能为空',
            'name.max' => '标签名称长度小于50',
        ];
    }

}
