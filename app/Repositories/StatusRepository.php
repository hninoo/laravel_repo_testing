<?php
namespace App\Repositories;
use App\Status;

Class StatusRepository extends BaseRepository
{
    protected $model;

	public function __construct(Status $model)
	{
		$this->model = $model;
    }
    public function statusAll()
    {
        return $this->model->get();
    }


}

?>
