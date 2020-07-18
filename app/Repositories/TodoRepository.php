<?php

namespace App\Repositories;
use App\Todo;

class TodoRepository extends BaseRepository
{
    protected $model;

	public function __construct(Todo $model)
	{
		$this->model = $model;
    }
    
}
