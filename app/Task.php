<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use Authenticatable;

    protected $table = 'tasks';

    protected $fillable = ['name'];

    protected $hidden = ['id'];
}
