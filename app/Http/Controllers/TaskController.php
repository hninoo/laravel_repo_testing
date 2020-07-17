<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TaskRepository;
use App\Repositories\StatusRepository;
use App\Repositories\TodoRepository;
class TaskController extends Controller
{

    function __construct(TaskRepository $taskrepo,StatusRepository $statusrepo,TodoRepository $todorepo)
	{
        $this->taskrepo = $taskrepo;
        $this->statusrepo = $statusrepo;
        $this->todorepo = $todorepo;
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->taskrepo->getAll();

        $status = $this->statusrepo->statusAll();

        return view('home',compact('data','status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        try{
            $this->taskrepo->create($data);
        }catch(\Exception $e){
            return redirect()->back()->withInput();
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    //assign status to task
    public function assign(Request $request)
    {

       $response = $this->todorepo->taskassign($request->status,$request->task_id);
       return redirect()->back();
    }
}
