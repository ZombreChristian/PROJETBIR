<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PDF;

class PdfgenerateController extends Controller
{
    public function generatePDF()
    {
        $data = [
            'heading' => 'Welcome to Funda of Web IT',
            'description' => 'This description of Funda of Web IT'
        ];
        $pdf = PDF::loadView('bon_form', $data);

        return $pdf->download('bon.pdf');
    }


    // public function AddBon(){
    //     return view('bon_form');
    // }
}
