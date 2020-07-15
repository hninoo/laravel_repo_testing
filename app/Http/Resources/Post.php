<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Post extends JsonResource
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
    }
    public function with($request)
    {
        return [
            'status'=>'success',
            'message'=>'show detail news',
        ];
    }
    
}
