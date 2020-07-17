<?php
namespace App\Repositories;
use App\Task;

Class TaskRepository extends BaseRepository
{
    protected $model;

	public function __construct(Task $model)
	{
		$this->model = $model;
    }
   

}

?>
