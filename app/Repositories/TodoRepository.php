<?php

namespace App\Repositories;
use Illuminate\Support\Facades\Validator;
use App\Todo;

class TodoRepository extends BaseRepository
{
    protected $model;

	public function __construct(Todo $model)
	{
		$this->model = $model;
    }
    public function validator(array $data)
    {
        $validator = Validator::make($data,[
            'task_name' => 'required|string|unique:todos',
        ]);
        return $validator;
    }
    public function taskassign($id,$status)
    {

        $model = $this->getById($id);

        $data = [];

        $data['status_id'] = $status;
        $data['user_id'] = 1;
        $model->fill($data);
        return $model->push();

    }
    public function getDataPDF(array $data)
    {

        foreach ($data as $key => $value) {
            $arr[] = $this->model->where('id',$value)->select('task_name','status_id')->get();
        }
        return $arr;
    }

}
