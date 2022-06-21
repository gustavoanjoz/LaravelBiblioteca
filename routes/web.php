<?php

use Illuminate\Support\Facades\Route;
use App\Models\Produto;
use App\Models\Categorias;
use Illuminate\Http\Request;

Route::get('/', function () {
    $produtos = Produto::all();
    return view('principal', ['produtos' => $produtos]);
});

Route::get('/cadastrar-produto', function () {
    $categorias = Categorias::all();
    return view('cadastrar', ['categorias' => $categorias]);
});

Route::post('/cadastrar-produto', function(Request $request){
    Produto::create([
        'nome' => $request->nome,
        'categoria_id' => $request->categoria_id,
        'valor' => $request->valor,
        'estoque' => $request->estoque
    ]);

    return view('cadastrado');
});

Route::get('/editar-produto/{id}', function($id){
    $produto = Produto::find($id);
    return $produto;
});

Route::post('/editar-produto/{id}', function(Request $request, $id){
    $produto = Produto::find($id);

    $produto->update([
    'nome' => $request->nome,
    'categoria_id' => $request->categoria_id,
    'valor' => $request->valor,
    'estoque' => $request->estoque
    ]);

    $produtos = Produto::all();
    return view('principal', ['produtos' => $produtos]);
});

Route::get('/excluir-produto/{id}', function($id){
    $produto = Produto::find($id);
    $produto->delete();
});


//--------------------

Route::get('/categoria', function () {
    $categorias = Categorias::all();
    return view('categoria', ['categorias' => $categorias]);
});

Route::get('/cadastrar-categoria', function () {
    return view('cadastrarCategoria');
});

Route::post('/cadastrar-categoria', function(Request $request){
    Categorias::create([
        'categoria_nome' => $request->categoria_nome
    ]);

    return view('cadastradoCategoria');
});

Route::get('/editar-categoria/{id}', function($id){
    $categoria = Categorias::find($id);
    return $categoria;
});

Route::post('/editar-categoria/{id}', function(Request $request, $id){
    $categoria = Categorias::find($id);

    $categoria->update([
        'categoria_nome' => $request->categoria_nome
    ]);

    $categorias = Categorias::all();
    return view('categoria', ['categorias' => $categorias]);
});

Route::get('/excluir-categoria/{id}', function($id){
    $categoria = Categorias::find($id);
    $categoria->delete();
});
