<form action="{{$action}}" method="post" enctype="multipart/form-data">
        @csrf
        @if($update)
        @method("PUT")
        @endif
        <div class="mb-3">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome do Documento" 
        @isset($nome)value="{{$nome}}"@endisset>
        <br>
        <label for="localizacao">Localizacao:</label>
        <input type="text" id="localizacao" name="localizacao" class="form-control" placeholder="Ex: Armário X, Gaveta X"
        @isset($localizacao)value="{{$localizacao}}"@endisset>
        <br>
        <label for="categoria">Categoria:</label>
        <input type="text" id="categoria" name="categoria" class="form-control" placeholder="Ex: Documentos RH" 
        @isset($categoria)value="{{$categoria}}"@endisset>
        <br>
        <label for="data">Data do documento:</label>
        <input type="date" id="data" name="data" class="form-control" placeholder="Ex: XX/XX/XXXX"
        @isset($data)value="{{ \Carbon\Carbon::parse($data)->format('Y-m-d') }}"@endisset>

        <div>
                <label for="file">Escolha um arquivo: </label>
                <input type="file" name="file" id="file">
                
        </div>

        </div>

        <button type="submit" class="btn btn-primary">Adicionar</button>

    </form>

    