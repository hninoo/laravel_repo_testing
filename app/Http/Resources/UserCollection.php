<?php

namespace App\Http\Resources;
use Lang;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public static $wrap = 'result';
    public $collects = 'App\Http\Resources\User';
    public function toArray($request)
    {
        return $this->collection;
            // 'pagination' => [
            //     'total' => $this->total(),
            //     'count' => $this->count(),
            //     'per_page' => $this->perPage(),
            //     'current_page' => $this->currentPage(),
            //     'total_pages' => $this->lastPage()
            // ],

    }
    // public function withResponse($request, $response)
    // {
    //     $jsonResponse = json_decode($response->getContent(), true);
    //     unset($jsonResponse['links'],$jsonResponse['meta']);
    //     $response->setContent(json_encode($jsonResponse));
    // }
    public function with($request)
    {
        return [
            'status' => '1',
            "message"=> Lang::get('response.message')

        ];
    }
}
