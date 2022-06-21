<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <title>Produtos - Cadastrar</title>
</head>

<body>
  <div class="min-h-screen w-full flex justify-center items-center p-8 flex-col bg-zinc-900">
    <div class="flex flex-col w-full max-w-lg shadow-2xl border overflow-hidden rounded-xl bg-zinc-700 border-zinc-800">
      <span class="font-bold text-6xl ml-3 mb-2 text-white">Novo Produto</span>
      <form class="mx-4" action="/cadastrar-produto" method="POST">
        @csrf
        <label class="text-white block text-sm font-bold mb-2" for="lblNome">
          Nome:
        </label>
        <input class="bg-zinc-800 mb-3 border-zinc-700 shadow appearance-none border rounded w-full py-2 px-3 text-zinc-300 leading-tight focus:outline-none focus:shadow-outline" name="nome" type="text">
        <label class="text-white block text-sm font-bold mb-2" for="lblCategoria">
          Categoria:
        </label>
        <!-- <input class="bg-zinc-800 mb-3 border-zinc-700 shadow appearance-none border rounded w-full py-2 px-3 text-zinc-300 leading-tight focus:outline-none focus:shadow-outline" name="categoria_id" type="number"> -->
        <select class="bg-zinc-800 mb-3 border-zinc-700 shadow appearance-none border rounded w-full py-2 px-3 text-zinc-300 leading-tight focus:outline-none focus:shadow-outline" name="categoria_id">
          @foreach ($categorias as $categoria)
          <option value="{{$categoria -> id}}">{{$categoria -> id}} - {{$categoria -> categoria_nome}}</option>
          @endforeach
        </select>
        <label class="text-white block text-sm font-bold mb-2" for="lblValor">
          Valor:
        </label>
        <input class="bg-zinc-800 mb-3 border-zinc-700 shadow appearance-none border rounded w-full py-2 px-3 text-zinc-300 leading-tight focus:outline-none focus:shadow-outline" name="valor" type="text">
        <label class="text-white block text-sm font-bold mb-2" for="lblQuantidade">
          Quantidade:
        </label>
        <input class="bg-zinc-800 border-zinc-700  mb-4 shadow appearance-none border rounded w-full py-2 px-3 text-zinc-300 leading-tight focus:outline-none focus:shadow-outline" name="estoque" type="text">
        <div class="flex items-center justify-around">
          <a href="/">
            <button type="button" class="shadow mb-2 bg-red-600 hover:bg-red-800 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
              Voltar
            </button>
          </a>
          <button type="submit" class="shadow ml-3 mb-2 bg-blue-600 hover:bg-blue-800 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
            Cadastrar
          </button>
        </div>
    </div>
  </div>
  </form>
</body>

</html>