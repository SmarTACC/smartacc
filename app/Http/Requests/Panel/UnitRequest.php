<?php

namespace App\Http\Requests\Panel;

use App\Http\Requests\Request;

class UnitRequest extends Request
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
      'singular_name' => 'required',
      'plural_name' => 'required'
    ];
  }

  public function messages()
  {
    return [
      'singular_name.required' => 'Se requiere un nombre en singular',
      'plural_name.required' => 'Se requiere un nombre en plural',
    ];
  }
}
