<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class PutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */



     static public function myRules(){

     /*   return [
            'title' => 'required|min:5|max:500',
            //'slug' => 'required|min:5|max:500|unique:posts',
            'content' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'posted' => 'required'
        ];*/
     }


    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
       //return $this->myRules();

       return [
        'title' => 'required|min:5|max:500',
        'slug' => 'required|min:5|max:500|unique:categories,slug,'.$this->route('category')->id
    ];
    }
}
