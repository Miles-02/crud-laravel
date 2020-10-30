<style>
    li{
        display: inline-block;
        margin-bottom: 20px
    }

  
</style>

<h1>Tarefas</h1>

<a href="{{route('tarefas.add')}}">Adicionar tarefas</a>

<ul>
    @foreach($tarefas as $item)
        <li>{{$item->titulo}}</li>
        <a href="{{route('tarefas.edit', $item->id)}}">Editar</a>
        <a href="{{route('tarefas.delAction', $item->id)}}" onclick="return confirm('Tem certeza que deseja excluir?')">Apagar</a><br>
        
    @endforeach

    


</ul>

