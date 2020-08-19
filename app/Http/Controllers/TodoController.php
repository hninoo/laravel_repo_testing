<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\StatusRepository;
use App\Repositories\TodoRepository;
use App\Exports\TodosExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
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

        $validator = $this->todorepo->validator($request->all());
        if($validator->fails()){

            return back()->withErrors($validator)->withInput();

        }
        $data = [];
        $description = $request->description;
        $dom = new \domdocument();
        $dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $description = $dom->savehtml();

        $data['task_name'] = $request->task_name;
        $data['description'] = $description;
        $data['user_id'] = 1;
        $data['status_id'] = 1;

        try{
            $this->todorepo->create($data);
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       $response = $this->todorepo->taskassign($request->id,$request->status);

       return redirect()->back()->with('status','Update Success!');
    }

    /**
     * Remove the specified resource from storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->todorepo->delete($request->id);
        return redirect()->back()->with('status','Delete Success!');
    }

    /**
     * Export Excel
     */
    public function todosExport()
    {
        $export = $this->todorepo->getAll();
        return Excel::download(
            new TodosExport( $export ), 'report.xlsx');

    }
    /**
     * Generate Pdf For All
     */
    public function generatePDF(Request $request)
    {

        if($request->hiddenid == null)
        {
            return redirect()->back()->withErrors(["error"=>'Please Check All CheckBox']);
        }
        else
        {
            $result_arr = array();
            $data = $this->todorepo->getDataPDF($request->hiddenid);

            $pdf = PDF::loadView('exports.todopdf',
                            ['data' => $data]);
            return $pdf->download('todotask.pdf');
        }

    }
    /**
     * Print Pdf
     */
    public function printPdf(Request $request)
    {
        $id=$request->input('id');

        $data = $this->todorepo->getById($id);

        $pdf = PDF::loadView('exports.todopdfprint', [
            'data' => $data

        ]);
        // return $pdf->download('todotask.pdf');
        return base64_encode($pdf->download('todotask.pdf'));

    }


}
