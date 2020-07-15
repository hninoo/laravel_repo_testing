<?php

namespace App\Repositories;
use App\Todo;

class TodoRepository
{
    public function all()
    {
        return Todo::all();
    }

    public function findById($id)
    {
        return Todo::FindOrFail($id);
    }
    public function create(array $attributes)
    {
        return Todo::create($attributes);
    }

    public function update(array $attributes)
    {
        $todo = Todo::where("id", $attributes['id'])->update([
            "text" => $attributes['text'],
            "user_id" => $attributes['user_id'],
            "completed" => $attributes['completed']
        ]);
        return $todo;
    }

    public function delete($id)
    {
        $todo = Todo::findOrFail($id);
        return $todo->destroy($id);
    }

}