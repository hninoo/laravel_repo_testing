<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\category;
use App\Http\Resources\Category as CategoryResource;
use App\post;
use App\Http\Resources\Post as PostResource;

class NewsController extends Controller
{
    public function categories(){
        return new CategoryResource(category::all());
    }

    public function categorypost(){

        return new PostResource(post::paginate(3));

    }

    public function detail($id){
        
        return new PostResource(post::find($id));

    }

}
