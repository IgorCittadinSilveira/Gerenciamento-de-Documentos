<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\GerenciamentoFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\models\Documento;
use App\models\DocumentoVersion;
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

      //Função para acessar a View de create
  public function create()
      {
        return view('gerenciamento.create');
      }

      //Função para adicionar um novo Documento
  public function store(GerenciamentoFormRequest $request)
      {

    $publico = $request->has('publico') ? 1 : 0;

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
        'publico' => $publico,  
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

      //Função para acessar a view de edit
 public function edit($id)
      {

        $documento = Documento::findOrFail($id);
        $versions = DocumentoVersion::where('documento_id', $id)->get();

       // return view('gerenciamento.edit')->with('documento',$documento); 
   //     return view('gerenciamento.edit', [
     //     'documento' => $documento,
    //      'versions' => $versions
    //  ]);
    return view('gerenciamento.edit', compact('documento', 'versions'));
  
      }

      //Função para atualizar um documento
      public function update($id, GerenciamentoFormRequest $request)
      {
          // Recupera o documento original
          $documento = Documento::findOrFail($id);
      
          // Salva a versão anterior do documento antes de atualizá-lo
          $documentoVersion = new DocumentoVersion();
          $documentoVersion->documento_id = $documento->id;
          $documentoVersion->nome = $documento->nome;
          $documentoVersion->localizacao = $documento->localizacao;
          $documentoVersion->categoria = $documento->categoria;
          $documentoVersion->data = $documento->data;
          $documentoVersion->publico = $documento->publico;
          $documentoVersion->arquivo = $documento->arquivo;
          $documentoVersion->save();  // Cria uma nova versão do documento no banco
      
          // Atualiza o documento com os novos dados
          $publico = $request->has('publico') ? 1 : 0;
      
          if ($request->hasFile('file')) {
              $file = $request->file('file');
              $path = $file->store('uploads', 'public');
          } else {
              // Se o arquivo não foi enviado, mantém o arquivo atual
              $path = $documento->arquivo;
          }
      
          // Atualiza o documento
          $documento->update([
              'nome' => $request->input('nome'),
              'localizacao' => $request->input('localizacao'),
              'categoria' => $request->input('categoria'),
              'data' => $request->input('data'),
              'publico' => $publico,
              'arquivo' => $path,  // Atualiza o caminho do arquivo
              'updated_at' => now(),
          ]);
      
          // Redireciona para a página de gerenciamento com a mensagem de sucesso
          return to_route('gerenciamento.index')->with('mensagem.sucesso', "Documento '{$documento->nome}' editado com sucesso");
      }

     
  public function showRelatorios(Request $request)
    {
        // Apenas exibe a página de relatórios, sem dados
        return view('relatorios.index');
    }

  public function exportRelatorioCsv(Request $request)
    {
        $data_inicio = $request->input('data_inicio');
        $data_fim = $request->input('data_fim');
    
        // Filtra os documentos entre as datas informadas
        $query = Documento::query();
    
        if ($data_inicio && $data_fim) {
            $query->whereBetween('data', [$data_inicio, $data_fim]);
        }
    
        $documentos = $query->get();
    
        // Criação da resposta para enviar o CSV
        $response = new StreamedResponse(function() use ($documentos) {
            $handle = fopen('php://output', 'w');
    
            // Adiciona o cabeçalho do CSV
            fputcsv($handle, ['Nome', 'Localizacao', 'Categoria', 'Data', 'Criado em', 'Atualizado em']);
    
            // Adiciona os dados dos documentos
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
    
        // Define os headers para forçar o download do arquivo CSV
        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment;filename="Relatorio.csv"');
        $response->headers->set('Cache-Control', 'max-age=0');
    
        return $response;
    }
    
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
        'publico' => $version->publico,
        'arquivo' => $version->arquivo,
    ]);
    
    return to_route('gerenciamento.index')->with('mensagem.sucesso', "Documento restaurado para a versão de {$version->created_at}");
  }


}
