<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Categoria - Cadastrado</title>
</head>

<body>
    <div class="flex flex-col min-h-screen items-center justify-center bg-zinc-900">
        <span class=" text-4xl font-bold text-white">Categoria criada com sucesso!</span>
        <div class="mt-5 flex items-center justify-center bg-zinc-900">
            <a href="/categoria"><button type="button" class="shadow bg-slate-600 hover:bg-slate-800 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
                  Voltar ao Início
            </button></a>
            <a href="/cadastrar-categoria"><button type="button" class="ml-10 shadow bg-red-600 hover:bg-red-800 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
                  Voltar
            </button></a>
        </div>
    </div>
</body>

</html>