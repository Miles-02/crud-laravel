<h1>Editar tarefa</h1>
<form method="POST">
    @csrf

    <label for="titulo">Título</label><br>
    <input type="text" name="titulo" value="{{$tarefa->titulo}}">
    <br>
    <br>
    <button type="submit">Salvar</button>
</form>
