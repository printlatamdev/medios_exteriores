<?php

namespace App\Http\Controllers;

use App\Models\Externalmedia;
use App\Models\Sale;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function contractPDF(Sale $sale)
    {
        return Pdf::loadView('contract', ['records' => $sale])->download('contract.pdf');
    }

    public function externalmediaPDF(Externalmedia $externalmedia)
    {
        return Pdf::loadView('externalmedia', ['record' => $externalmedia])->setPaper(['0, 0, 33.87, 19.05'])->download('externalmedia.pdf');
    }
}
