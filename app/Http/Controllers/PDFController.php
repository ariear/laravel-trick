<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function index () {
        $pdf = PDF::loadView('pdf.generate_pdf', [
            'title' => 'Apakah Ini Title Mas ?',
            'date' => date('m/d/Y'),
            'users' => User::all()
        ]);

        return $pdf->download('arie.pdf');
    }
}
