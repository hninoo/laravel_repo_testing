<?php

namespace App\Exports;

use App\Todo;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class TodosExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public $exports;
    public function __construct($exports)
    {
        $this->exports = $exports;

    }
    public function view() : View
    {
        return view('exports.todo', [
            'todos' => $this->exports,
        ]);
    }

}
