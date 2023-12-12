<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{
    //
    public function viewPDF(){
        $pdf = PDF::loadView('pdf.prescription');
        return $pdf->stream();
    }
}
