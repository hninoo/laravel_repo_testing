<?php
namespace App\Repositories;
use Illuminate\Support\Facades\Validator;
use App\Permission;

Class PermissionRepository extends BaseRepository
{
    protected $model;

	public function __construct(Permission $model)
	{
		$this->model = $model;
    }
    public function validator(array $data)
    {
        $validator = Validator::make($data,[
            'name' => 'required|string|unique:permissions',
        ]);
        return $validator;
    }

}

?>
