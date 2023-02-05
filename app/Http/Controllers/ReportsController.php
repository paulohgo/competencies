<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Level;

class ReportsController extends Controller
{
    public function index()
    {
        $reportData = getFullReport();
        return view('reports.index', compact('reportData'));

    }

    public function fullReport()
    {
        $levels = Level::all();
        $records = getFullReport();
        return view('reports.fullreport', compact('records', 'levels'));
    }
}
