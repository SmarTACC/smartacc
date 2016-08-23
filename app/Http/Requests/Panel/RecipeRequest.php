<?php

namespace App\Http\Requests\Panel;

use App\Http\Requests\Request;

class RecipeRequest extends Request
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
      'name' => 'required',
      'description' => 'required',
    ];
  }

  public function messages()
  {
    return [
      'name.required' => 'Se requiere un nombre',
      'description.required' => 'Se requiere una descripción',
    ];
  }
}
