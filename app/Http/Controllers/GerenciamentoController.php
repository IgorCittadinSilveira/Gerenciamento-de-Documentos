<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\GerenciamentoFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\models\Documento;
use App\models\DocumentoVersion;
use App\models\User;
use Symfony\Component\HttpFoundation\StreamedResponse;

class GerenciamentoController extends Controller
{

//Função da tela padrão do Gerenciamento
 public function index(Request $request)
      {

        $search = request('search');
        if($search) {
          $documentos = Documento::where([['nome','like','%'.$search.'%']])
          ->orWhere([['localizacao','like','%'.$search.'%']])
          ->orWhere([['categoria','like','%'.$search.'%']])
          ->orWhere([['data','like','%'.$search.'%']])
          ->get();
        }else{
          $documentos = Documento::all();
        }
       
        $mensagemSucesso = $request->session()->get('mensagem.sucesso');
        $request->session()->forget('mensagem.sucesso');

        return view('gerenciamento.index', ['search' => $search])->with('documentos', $documentos)->with('mensagemSucesso', $mensagemSucesso);
      }

//Função para acessar a View create
 public function create()
      {
        $users = User::all();

    
        return view('gerenciamento.create', compact('users'));
      }

//Função para adicionar um novo Documento
 public function store(GerenciamentoFormRequest $request)
      {

    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $path = $file->store('uploads', 'public'); 
    } else {
 
        return back()->with('error', 'Por favor, envie um arquivo');
    }

    $documento = Documento::create([
        'nome' => $request->input('nome'),
        'localizacao' => $request->input('localizacao'),
        'categoria' => $request->input('categoria'),
        'data' => $request->input('data'),
        'arquivo' => $path,     
        'created_at' => now(),
        'updated_at' => now(),
    ]);

  

        return to_route('gerenciamento.index')->with('mensagem.sucesso', "Documento {$documento->nome} adcionada com sucesso");
      }

//Função para apagar um Documento
 public function destroy($id)
      {

        $documento = Documento::findOrFail($id);
        $documento->delete();
        return to_route('gerenciamento.index')->with('mensagem.sucesso', "Documento'{$documento->nome}' removido com sucesso");
      }

//Função para acessar a view edit
 public function edit($id)
      { $versions = DocumentoVersion::where('documento_id', $id)->get();

        $documento = Documento::findOrFail($id);
        $users = User::all();
    
        return view('gerenciamento.edit', compact('documento', 'users','versions'));
      }

//Função para atualizar um documento
 public function update($id, GerenciamentoFormRequest $request)
      {

          $documento = Documento::findOrFail($id);
      

          $documentoVersion = new DocumentoVersion();
          $documentoVersion->documento_id = $documento->id;
          $documentoVersion->nome = $documento->nome;
          $documentoVersion->localizacao = $documento->localizacao;
          $documentoVersion->categoria = $documento->categoria;
          $documentoVersion->data = $documento->data;
          $documentoVersion->arquivo = $documento->arquivo;
          $documentoVersion->save();  
      
          if ($request->hasFile('file')) {
              $file = $request->file('file');
              $path = $file->store('uploads', 'public');
          } else {
              $path = $documento->arquivo;
          }
      
          $documento->update([
              'nome' => $request->input('nome'),
              'localizacao' => $request->input('localizacao'),
              'categoria' => $request->input('categoria'),
              'data' => $request->input('data'),

              'arquivo' => $path,
              'updated_at' => now(),
          ]);
   



          return to_route('gerenciamento.index')->with('mensagem.sucesso', "Documento '{$documento->nome}' editado com sucesso");
      }

//Função para acessar a view index da pasta relatórios
 public function showRelatorios(Request $request)
    {
        // Apenas exibe a página de relatórios, sem dados
        return view('relatorios.index');
    }
//Função para baixar o reltório
 public function exportRelatorioCsv(Request $request)
    {
        $data_inicio = $request->input('data_inicio');
        $data_fim = $request->input('data_fim');
    

        $query = Documento::query();
    
        if ($data_inicio && $data_fim) {
            $query->whereBetween('data', [$data_inicio, $data_fim]);
        }
    
        $documentos = $query->get();
    

        $response = new StreamedResponse(function() use ($documentos) {
            $handle = fopen('php://output', 'w');
    

            fputcsv($handle, ['Nome', 'Localizacao', 'Categoria', 'Data', 'Criado em', 'Atualizado em']);
    

            foreach ($documentos as $documento) {
                fputcsv($handle, [
                    $documento->nome,
                    $documento->localizacao,
                    $documento->categoria,
                    $documento->data,
                    $documento->created_at,
                    $documento->updated_at,
                ]);
            }
    
            fclose($handle);
        });
    
        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment;filename="Relatorio.csv"');
        $response->headers->set('Cache-Control', 'max-age=0');
    
        return $response;
    }
//Função para restaurar versão
 public function restoreVersion($versionId)
  {
    $version = DocumentoVersion::findOrFail($versionId);

    // Encontre o documento original
    $documento = Documento::findOrFail($version->documento_id);
    
    // Restaura os dados do documento para a versão
    $documento->update([
        'nome' => $version->nome,
        'localizacao' => $version->localizacao,
        'categoria' => $version->categoria,
        'data' => $version->data,
        'arquivo' => $version->arquivo,
    ]);
    
    return to_route('gerenciamento.index')->with('mensagem.sucesso', "Documento restaurado para a versão de {$version->created_at}");
  }


}
