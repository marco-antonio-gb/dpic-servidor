<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UsuariosResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
        // return [
        //     'type'      =>'usuarios',
        //     'id'        =>(string)$this->idUsuario,
        //     'atributes' =>[
        //         'nombre'=>$this->nombres,
        //     ],
        // ];
    }
}
