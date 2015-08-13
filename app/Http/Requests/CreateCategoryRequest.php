<?php namespace App\Http\Requests;

class CreateCategoryRequest extends Request
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
            'name'          => 'required|max:50|unique:categories',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '分类名称不能为空',
            'name.unique' => '分类名称不能重复',
            'name.max' => '分类名称长度小于50',
        ];
    }

}