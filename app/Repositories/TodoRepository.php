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
    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }


    public function taskassign($status)
    {

        $data = [];

        $data['status_id'] = $status;
        $data['user_id'] = 1;

        return $this->model->push($data);
    }



}
