<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\GerenciamentoFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\models\Documento;

class GerenciamentoController extends Controller
{
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

  public function create()
      {
        return view('gerenciamento.create');
      }

  public function store(GerenciamentoFormRequest $request)
      {

         // Verifique e defina o valor correto para o campo 'publico'
    $publico = $request->has('publico') ? 1 : 0;

    // Verifica se um arquivo foi enviado e o faz o upload
    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $path = $file->store('uploads', 'public'); // Armazena o arquivo na pasta 'uploads' e retorna o caminho
    } else {
        // Se nenhum arquivo foi enviado, você pode definir um valor padrão ou tratar como erro
        return back()->with('error', 'Por favor, envie um arquivo');
    }

    // Crie o documento, agora incluindo o caminho do arquivo
    $documento = Documento::create([
        'nome' => $request->input('nome'),
        'localizacao' => $request->input('localizacao'),
        'categoria' => $request->input('categoria'),
        'data' => $request->input('data'),
        'publico' => $publico,  // Agora 'publico' é tratado corretamente
        'arquivo' => $path,      // Caminho do arquivo que foi enviado
        'created_at' => now(),
        'updated_at' => now(),
    ]);
        //$documento = Documento::create($request->all());
        //$publico = request()->has('publico') ? 1 : 0;

        return to_route('gerenciamento.index')->with('mensagem.sucesso', "Documento {$documento->nome} adcionada com sucesso");
      }

 public function destroy($id)
      {

        $documento = Documento::findOrFail($id);
        $documento->delete();
        return to_route('gerenciamento.index')->with('mensagem.sucesso', "Documento'{$documento->nome}' removido com sucesso");
      }
 public function edit($id)
      {

        $documento = Documento::findOrFail($id);
        return view('gerenciamento.edit')->with('documento',$documento); 
      }

 public function update($id, GerenciamentoFormRequest  $request)
      {

      // Encontre o documento com o ID fornecido
    $documento = Documento::findOrFail($id);

    // Verifique e defina o valor correto para o campo 'publico'
    $publico = $request->has('publico') ? 1 : 0;

            // Verifica se um arquivo foi enviado e o faz o upload
    if ($request->hasFile('file')) {
      $file = $request->file('file');
      $path = $file->store('uploads', 'public'); // Armazena o arquivo na pasta 'uploads' e retorna o caminho
  } else {
      // Se nenhum arquivo foi enviado, você pode definir um valor padrão ou tratar como erro
      return back()->with('error', 'Por favor, envie um arquivo');
  }

    // Atualize os dados do documento, excluindo o campo 'publico' para não sobrescrever
    $documento->update([
        'nome' => $request->input('nome'),
        'localizacao' => $request->input('localizacao'),
        'categoria' => $request->input('categoria'),
        'data' => $request->input('data'),
        'publico' => $publico,  // Atualize o campo 'publico'
        'arquivo' => $path,     
        'updated_at' => now(),  // Defina a data de atualização
    ]);

        return to_route('gerenciamento.index')->with('mensagem.sucesso', "Documento'{$documento->nome}' editado com sucesso");
      }

      //public function showUploadForm()
      //{
      //   return view('gerenciamento.upload');
      //}

     // public function handleUpload(Request $request){

       // $request->validate([
          //'file' => 'required│mimes:PDF, DOCX, PNG, JPG│max:2048',
       // ]);

      //  $file = $request->file('file');
      //  $path = $file->store('uploads','public');
//
      //  return back()->with('sucess','Arquivo enviado com sucesso')->with('file', $path);

      //}

}
