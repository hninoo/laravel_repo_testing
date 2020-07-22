<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PermissionRepository;
class PermissionController extends Controller
{
    function __construct(PermissionRepository $perRepo)
	{

        $this->perRepo = $perRepo;

	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = $this->perRepo->getAll();
        return view('permissions.create',compact('permissions'));
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
        $validator = $this->perRepo->validator($request->all());

        if($validator->fails()){

            return back()->withErrors($validator)->withInput();

        }

        $data = [];
        $data['name'] = $request->name;
        $data['guard_name'] = 'web';
        try{
            $this->perRepo->create($data);
        }catch(\Exception $e){
            echo $e->getMessage();
            // return redirect()->back()->withInput();
        }
        return redirect()->back()->with('status','Success!');
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
    public function update(Request $request)
    {
        $data=[];
        $data['id'] = $request->id;
        $data['name']= $request->name;
        try{

            $this->perRepo->update($data,$data['id']);

        }catch(\Exception $e){
            echo $e->getMessage();
        }
        return redirect()->back()->with('status','Update Success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->perRepo->delete($request->id);
        return redirect()->back()->with('status','Delete Success!');
    }
}
