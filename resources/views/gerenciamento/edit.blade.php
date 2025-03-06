<x-layout title="Editar documento {{$documento->nome}}"> 
    <x-form :action="route('gerenciamento.update', $documento->id)" 
    :nome="$documento->nome" 
    :localizacao="$documento->localizacao" 
    :categoria="$documento->categoria"
    :data="$documento->data"
    :publico="$documento->publico"
    :update="true"/>
</x-layout>