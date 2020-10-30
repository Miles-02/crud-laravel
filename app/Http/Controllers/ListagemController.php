<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;

class ListagemController extends Controller
{
    public function index()
    {
        $tarefas = DB::select('SELECT * from tarefas');
        
        return view('list', [
            'tarefas' => $tarefas
        ]);
    }

    public function add(){
        return view('add');
    }

    public function addAction(Request $request){
        if($request->input('titulo')){
            $titulo = $request->input('titulo');

            DB::insert('INSERT into tarefas(titulo) values(?)', [$titulo]);

            return redirect('/tarefas');

        } else{
            return view ('add');
        }
       
    }

    public function edit($id){
       $data = DB::select("SELECT * from tarefas WHERE id = :id", [
           'id' => $id
       ]);

       if(count($data) > 0){
           
           $tarefa = DB::select("SELECT * from tarefas WHERE id = :id", [
            'id' => $id
           ]);

           return view('edit', [
               'tarefa' => $tarefa[0]
           ]);
       } else{
           echo 'Essa tarefa não existe no banco de dados!';
       }
    }

    public function editAction(Request $request, $id){
        if($request->filled('titulo')){
            $titulo = $request->input('titulo');

            DB::update('UPDATE tarefas SET titulo = :titulo WHERE id = :id', [
                'titulo' => $titulo,
                'id' => $id
            ]);

        }

        return redirect()->route('tarefas.index');
    }

    public function delAction($id){
        DB::delete('DELETE FROM tarefas WHERE id= :id',[
            'id' => $id
        ]);

        return redirect()->route('tarefas.index');
    }
}