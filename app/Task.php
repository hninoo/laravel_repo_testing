<?php

namespace App;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use Authenticatable;

    protected $table = 'tasks';

    protected $fillable = ['name'];

    protected $hidden = ['id'];
    public function todos()
    {
        return $this->hasMany('App\Todo');
    }

}
