<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardUserController extends Controller
{
    public function index () {
        $users = User::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("month_name"))
                    ->orderByRaw("FIELD(month_name, 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December')")
                    ->pluck('count', 'month_name');

        $lateryearuser = User::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
                    ->whereYear('created_at', date('Y') - 1)
                    ->groupBy(DB::raw("month_name"))
                    ->orderByRaw("FIELD(month_name, 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December')")
                    ->pluck('count', 'month_name');

        // User::selectRaw("COUNT(*) as count, MONTHNAME(created_at) as month_name")
        //     ->whereYear('created_at', date('Y'))
        //     ->groupByRaw("month_name")
        //     ->orderBy('id','ASC')
        //     ->pluck('count', 'month_name');

        return view('chart.index', [
            'labels' => $users->keys(),
            'data' => $users->values(),
            'lateryearuser' => $lateryearuser
        ]);
    }
}
