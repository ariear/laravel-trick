<?php

namespace App\Http\Controllers;

use App\Exports\UserExport;
use App\Imports\UserImport;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportImportController extends Controller
{
    public function index () {
        return view('export_import.index',[
            'users' => User::all()
        ]);
    }

    public function export () {
        return Excel::download(new UserExport, 'users.xlsx');
    }

    public function import () {
        Excel::import(new UserImport, request()->file('file'));

        return back();
    }
}
