<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReportRequest;
use App\Models\Report;
use App\Services\UploadService;

class ReportController extends Controller
{

        public function index()
        {
            $reports = Report::all();
            return view('reports.index', [
                "reports" => $reports
            ]);
        }

        public function show()
        {
            $reports = Report::where('status', Report::STATUS_AGUARDANDO)->paginate(5);
            return view('reports.list', [
                "reports" => $reports
        ]);
        }
       
        public function create()
        {
            return view('reports.form');

        }
        
        public function store(Report $report, ReportRequest $request) 
        {
            
            $dados = $request->all();                             
            $dados['imagem'] = UploadService::upload($request);  
            Report::create($dados);                            
        
            return redirect('/reports/list')->with(['mensagem'=> 'Registro criado com sucesso!']);
        }
    
        public function edit(Report $report)
        {
            return view('reports.form', [
                'report' => $report
            ]); 
        }
    
        public function update(Report $report, Request $request)
        {   
            $dados = $request->all();
            if ($request->imagem) 
            {
                $dados['imagem'] = UploadService::upload($request);
            }
            $report->update($dados);
            // return redirect()->back()->with('mensagem', 'Registro atualizado com sucesso!');
            return redirect('/reports/list')->with('mensagem', 'Registro atualizado com sucesso!');

        }
    
        public function destroy(Report $report)
        {
            $report->delete();
            return redirect('/reports/list')->with('mensagem', 'Registro excluído com sucesso!');
        }

}
