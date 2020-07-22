<?php
namespace App\Repositories;
use App\User;

Class UserRepository extends BaseRepository
{
    protected $model;

	public function __construct(User $model)
	{
		$this->model = $model;
    }
    public function validator(array $data)
    {
        $validator = Validator::make($data,[
            'name' => 'required|string|unique:users',
            'email'=> 'required',
            'role_id' => 'required',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|same:password',
        ]);
        return $validator;
    }

}

?>
