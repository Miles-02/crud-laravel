<h1>Adicionar tarefa</h1>
<form method="POST">
    @csrf

    <label for="titulo">Título</label><br>
    <input type="text" name="titulo">
    <br>
    <br>
    <button type="submit">Enviar</button>
</form>
