<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
$prueba= "resource";

class InventarioResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
        }
}