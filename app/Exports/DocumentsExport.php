<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DocumentsExport implements FromView
{
    public function __construct($query)
    {
        $this->query = $query;
    }

    public function view(): View
    {
        return view('reports.excel', [
            'query' => $this->query
        ]);
    }
}
