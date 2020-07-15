<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Repositories\TodoRepository;
use App\Todo;

class TodoController extends Controller
{
    private $todo;

    public function __construct(TodoRepository $todoRepo)
    {
        $this->todo = $todoRepo;
    }

    public function index()
    {
        $todo = $this->todo->all();

        return $todo;
    }
    public function store(Request $request)
    {

        $todo = $this->todo->create($request->all());

        return response()->json($todo);

    }
    public function show($id)
    {
        $todo = $this->todo->findById($id);

        return response()->json($todo);
    }
    public function update(Request $request)
    {

        $todo = $this->todo->update($request->all());

        return response()->json(["todo_update" => $todo]);
    }
    public function delete($id)
    {
        $todo = $this->todo->delete($id);

        return response()->json(["success" => "successfully deleted "]);

    }
}
