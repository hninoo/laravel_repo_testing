<?php

namespace App;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use Authenticatable;
    protected $table = 'todos';
    protected $fillable = ['task_name','user_id','status_id'];
    protected $hidden = ['id'];
    public function tasks()
    {
        return $this->belongsTo('App\Task', 'task_id');
    }
    public function status()
    {
        return $this->belongsTo('App\Status');
    }

}
