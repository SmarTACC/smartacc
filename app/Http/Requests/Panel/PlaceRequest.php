<?php

namespace App\Http\Requests\Panel;

use App\Http\Requests\Request;

class PlaceRequest extends Request
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
      'address' => 'required',
      'description' => 'required',
      'lat' => 'required',
      'category_id' => 'required'
    ];
  }

  public function messages()
  {
    return [
      'name.required' => 'Se requiere un nombre',
      'address.required' => 'Se requiere una dirección',
      'description.required' => 'Se requiere una descrpción',
      'lat.required' => 'Se requiere marcar una dirección en el mapa',
      'category_id.required' => 'Se requiere una categoría'
    ];
  }
}
