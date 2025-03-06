<x-layout title="Documentos">
    @isset($mensagemSucesso)
<div class="alert alert-success">
        {{$mensagemSucesso}}
</div>
    @endisset

    
    <form action="{{route ('gerenciamento.index')}}" method="GET">
    <input type="text" name="search" id="search" placeholder="Pesquisar">
    </form>

    
<ul class="list-group">

    @foreach ($documentos as $documento) 
            @if($documento->arquivo)
                    @php
                        $ext = pathinfo($documento->arquivo, PATHINFO_EXTENSION);
                    @endphp
                    @if(in_array(strtolower($ext), ['pdf', 'docx', 'txt']))
    <li class="list-group-item d-flex justify-content-between alling-itens-center">
    <a href="{{ Storage::url($documento->arquivo) }}" target="_blank" class="btn btn-link">
        {{ $documento -> nome}}
        </a>
        <span>-</span>
        {{ $documento -> localizacao}}
        <span>-</span>
        {{ $documento -> categoria}}
        <span>-</span>
        {{ $documento -> data}}
        <span class="d-flex">
                <a href="{{ Storage::url($documento->arquivo) }}" download >
                   <button type="button" class="btn btn-success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-down-fill" viewBox="0 0 16 16">
                        <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1m-1 4v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 11.293V7.5a.5.5 0 0 1 1 0"></path>
                    </svg>
                    </button> 
                </a>

                <a href="{{route('gerenciamento.edit', $documento->id)}}" class="ms-2">
                    <button type="button" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"></path>
                    </svg>
                    </button>
                </a>

                <form action="{{ route('gerenciamento.destroy', $documento->id) }}" method="POST" style="display:inline;" class="ms-2">
                        @csrf
                        @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"></path>
                        </svg>
                    </button>
                </form>
        </span>
    </li>
    @endif
        @endif
    @endforeach    
</ul> 

<a href="{{route('gerenciamento.create')}}" class="btn btn-dark mb-2">Adicionar</a>
</x-layout>
