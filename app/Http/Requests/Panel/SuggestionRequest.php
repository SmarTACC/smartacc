<?php

namespace App\Http\Requests\Panel;

use App\Http\Requests\Request;

class SuggestionRequest extends Request
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
      'email' => 'sometimes|email',
      'description' => 'required',
    ];
  }

  public function messages()
  {
    return [
      'email.email' => 'El E-Mail ingresado no tiene un formato correcto',
      'description.required' => 'Se requiere una descripción',
    ];
  }
}
