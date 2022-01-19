<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Request\ReportRequest;
use App\Models\Report;
use App\Services\UploadService;

class ReportController extends Controller
{

        public function index()
        {
            $reports = Report::all();

            return view('reports.index', [
                'reports' => $reports
            ]);
        }

        public function show()
        {
            $reports = Report::where('status', Report::STATUS_AGUARDANDO)->paginate(10);
            return view('reports.list', [
                "reports" => $reports

        ]);
        }
    
        public function form()
        {
            return view('reports.form');
        }
    
        public function store(ReportRequest $request)
        {
            $dados = $request->all();
            $dados['imagem'] = UploadService::upload($dados['imagem']);
            Report::create($dados);
        
            return redirect()->back()->with('mensagem', 'Registro criado com sucesso!');
        }
    
        public function edit(Report $report)
        {
            return view('reports.form', [
                'report' => $report
            ]); 
        }
    
        public function update(Report $report, ReportRequest $request)
        {   
            $dados = $request->all();
            if ($request->imagem) 
            {
                $dados['imagem'] = UploadService::upload($dados['imagem']);
            }

            $report->update($dados);
            return redirect()->back()->with('mensagem', 'Registro atualizado com sucesso!');
        }
    
        public function destroy(Report $report)
        {
            $report->delete();
            return redirect()->back()->with('mensagem', 'Registro excluído com sucesso!');
        }

}
