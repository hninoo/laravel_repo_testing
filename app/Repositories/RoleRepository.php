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

                'name'      => 'required',

            ],
            [
                'name.required'         => 'The name field is required.',

            ]
        );

        return $validator;
    }
    public function existcheck($id)
    {
        $data = $this->model->where('id','<>',$id)->select('name')->first();
        return $data;
    }
    public function getRole()
    {
        $data=[];
        $roles = $this->model->select('id','name')->orderby('id','DESC')->get();
        foreach ($roles as $key => $value) {
            $data[$value->id]=$value->name;
        }
        return $data;
    }

}

?>
