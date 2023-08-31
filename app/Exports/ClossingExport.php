<?php

namespace App\Exports;

use App\Invoice;
use App\Models\Clossing;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ClossingExport implements FromView
{
    public function view(): View
    {
        return view('dataclossings', [
            'row' => Clossing::all()
        ]);
    }
}
