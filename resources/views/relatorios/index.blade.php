<x-layout title="Gerar relatorio" >
<div class="container">

    <!-- Formulário para filtrar documentos por período -->
    <form action="{{ route('relatorios.exportCsv') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="data_inicio">Data Início</label>
            <input type="date" name="data_inicio" id="data_inicio" class="form-control" required>
        </div>
        <br>
        <div class="form-group">
            <label for="data_fim">Data Fim</label>
            <input type="date" name="data_fim" id="data_fim" class="form-control" required>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Gerar Relatório</button>
    </form>
</div>
</x-layout>
