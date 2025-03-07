<x-layout title="Editar documento {{$documento->nome}}"> 
    <x-form :action="route('gerenciamento.update', $documento->id)" 
    :nome="$documento->nome" 
    :localizacao="$documento->localizacao" 
    :categoria="$documento->categoria"
    :data="$documento->data"
    :publico="$documento->publico"
    :update="true"/>


<h3>Versões</h3>

      @foreach($versions as $version)
<div   class="mb-3">      
        
        <span>Versão: {{ $version->nome }}</span>
        <a href="{{ route('gerenciamento.restoreVersion', $version->id) }}">Restaurar</a>
    </div>
    @endforeach

</x-layout>