<?php

namespace App\Http\Resources;

use App\Http\Resources\Role as RoleResource;
use Auth;
use App\Role;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{

    // public $preserveKeys = true;
    public function toArray($request)
    {
        // return parent::toArray($request);


        $role = Role::where('id', $this->role_id)->first();


        return[
                'user_id' => $this->id,
                'name' => $this->name,
                'email' => $this->email,
                'role' => $this->role->name,
                'roles' => RoleResource::make([
                    'roleId' =>$role->id,
                    'roleName'=>$role->name
                ])
            ];
    }
}
