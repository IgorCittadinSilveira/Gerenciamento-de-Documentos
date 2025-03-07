<x-layout title="Adicionar documento"> 
    <x-form :action="route('gerenciamento.store')" 
    :nome="old('nome')" 
    :localizacao="old('localizacao')" 
    :categoria="old('categoria')" 
    :data="old('data')"
    :users="$users" 
    :update="false"/>
</x-layout>