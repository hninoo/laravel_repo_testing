<?php
namespace App\Repositories;
use Illuminate\Support\Facades\Validator;
use App\Role;

Class RoleRepository extends BaseRepository
{
    protected $model;

	public function __construct(Role $model)
	{
		$this->model = $model;
    }
    public function validator(array $data)
    {
        $validator = Validator::make($data,[
            'name' => 'required|string|unique:roles',
        ]);
        return $validator;
    }
    public function updateValidator(array $data)
    {
        $validator = Validator::make($data, [

                'name'      => 'required|string|unique:roles',

            ],
            [

                'name.unique'           => 'The name has already been taken.!',
                'name.required'         => 'The name field is required.',

            ]
        );

        return $validator;
    }

}

?>
