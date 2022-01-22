<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;
use App\Services\UploadService;

class ReportController extends Controller
{
    public function index()
    {
        return Report::all();
    }

    public function store(Request $request)
    {
        return Report::create($request->all());
    }

    public function update(Request $request, Report $report) 
    {
        $report->update($request->all());
        return $report;
    }

    public function destroy(Report $report)
    {
        return $report->delete();
    }

    public function show(Report $report)
    {
        return $report;
    }
}
