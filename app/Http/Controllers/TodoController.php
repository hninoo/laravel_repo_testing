<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\StatusRepository;
use App\Repositories\TodoRepository;
class TodoController extends Controller
{

    function __construct(StatusRepository $statusrepo,TodoRepository $todorepo)
	{

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
        $data = $this->todorepo->getAll();

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
        $data = [];
        $data['task_name'] = $request->name;
        $data['user_id'] = 1;
        $data['status_id'] = 1;

        try{
            $this->todorepo->create($data);
        }catch(\Exception $e){
            echo $e->getMessage();
            // return redirect()->back()->withInput();
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
        dd($request);
       $response = $this->todorepo->taskassign($request->status);
       return redirect()->back();
    }
}
