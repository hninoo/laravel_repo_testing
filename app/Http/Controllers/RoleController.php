<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\RoleRepository;
use App\Repositories\PermissionRepository;
use App\Role;
class RoleController extends Controller
{
    function __construct(RoleRepository $roleRepo,PermissionRepository $perRepo)
	{

        $this->roleRepo = $roleRepo;
        $this->perRepo = $perRepo;

	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = $this->roleRepo->getAll();
        return view('roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $permissions = $this->perRepo->getAll();
        return view('roles.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = $this->roleRepo->validator($request->all());

        if($validator->fails()){

            return back()->withErrors($validator)->withInput();

        }
        try{

            $role = Role::create([
                'name'  => $request->name,
                'guard_name' => 'web',
            ]);
            $permissions = [];
            $permissions = $request->permission;

            $role->givePermissionTo($permissions);

        }catch(\Exception $e){
            echo $e->getMessage();
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
    public function edit(Request $request)
    {
        $role = $this->roleRepo->getById($request->id);
        $permissions = $this->perRepo->getAll();
        return view('roles.edit',compact('role','permissions'));
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


        $role = $this->roleRepo->existcheck($request->id);

        if($role!=null){
            $existingRecCheck = (strtolower(trim($request->input('name'))) == strtolower($role->name));
            if($existingRecCheck){
                $validator = $this->roleRepo->validator($request->all());
            }
            else{
                $validator = $this->roleRepo->updateValidator($request->all());

            }
            if($validator->fails()){

                return back()->withErrors($validator)->withInput();

            }

            $rl = $this->roleRepo->getById($request->id);

            try{


                $rl->name = trim($request->input('name'));

                $rl->save();

                $permissions = [];
                $permissions = $request->permission;
                $rl->syncPermissions($permissions);

            }catch(\Exception $e){
                echo $e->getMessage();
            }



        }
        else
        {
            $rl = $this->roleRepo->getById($request->id);

            try{


                $rl->name = trim($request->input('name'));

                $rl->save();

                $permissions = [];
                $permissions = $request->permission;
                dd($permissions);
                $rl->syncPermissions($permissions);

            }catch(\Exception $e){
                echo $e->getMessage();
            }
        }

        return redirect()->back()->with('status','Success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->roleRepo->delete($request->id);
        return redirect()->back()->with('status','Delete Success!');
    }
}
