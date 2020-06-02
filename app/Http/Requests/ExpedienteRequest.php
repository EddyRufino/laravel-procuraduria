<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpedienteRequest extends FormRequest
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
            // 'user_id' => '',
            'numExpediente' => 'required',
            'folio' => 'required',
            'materia_id' => 'required',
            'juzgado_id' => 'required',
            'especialistaLegal' => 'required',
            'demandante' => 'required',
            'demandado' => 'required',
            'destinatario' => 'required',
            'direccion' => 'required',
            'fechaApertura' => 'required',
            'proceso_id' => 'required',
            'acto' => 'required',
            'fechaAudiencia' => 'required',
            'condition' => ''
        ];
    }

    // public function withValidator($validator)
    // {
    //     $validator->after(function ($validator) {
    //         if ($this->status == 'available' && $this->stock == 0) {
    //             $validator->errors()->add('stock', 'If available must have stock');
    //         }
    //     });
    // }

}
