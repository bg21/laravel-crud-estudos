<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return $posts;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //primeira forma de adicionar 
        // $new_post = [
        //     "titulo" => "Primeiro post",
        //     "conteudo" => "Conteudo qualquer",
        //     "autor" => "Ju"
        // ];
        //$post = new Post($new_post);
        //$post->save();

        //segunda forma de adicionar
        $post = new Post();
        $post->titulo = 'segundo post';
        $post->conteudo = "meu conteudo segundo";
        $post->autor = "ju";
        $post->save();
        dd($post);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //primeira forma de listar todos
        // $post = new Post();
        // $posts = $post->all();
        // dd($posts);

        //forma de listar somente um com base em um parâmetro

        // o find pega sempre a chave primária, e no caso do nosso post a chave primaria / primary key é o id
        $post = new Post();
        $post = $post->find($id);
        //o dd é basicamente um var_dump
        // dd($post);
        return $post;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //mostra o form
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         //atualizando só um
        // $post = new Post();
        // $post = $post->find(1);
        // $post->titulo = "novo post";
        // $post->save();
        // return $post;

        //atualizando vários onde a coluna id for maior que 0
        $post = new Post();
        $post = $post->find($id)
            ->update(
                [
                    "autor" => "Desconhecido"
                ]
            );
        return $post;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         // $post = new Post();
        // $post = $post->find(3);
        // if($post){
        //     $post->delete();
        //     return "foi excluído";
        // }
        
        // return 'n tem esse post';


        $post = new Post();
        $post = $post->where("id", ">", 5);
        if($post){
            $post->delete();
            return "foi excluído";
        }
        
        return 'n tem esse post';

        // $post = new Post();
        // $post = $post->where("id", ">", 0);
        // $post->delete();
        // if($post){
        //     return "exluído tudo se o id for maior que 0";
        // }
    }
}
