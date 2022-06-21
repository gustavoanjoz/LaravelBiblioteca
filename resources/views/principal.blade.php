<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Produtos - Inicial</title>
</head>

<body>
    <div class="min-h-screen w-full flex justify-center items-center flex-col bg-zinc-900">
        <div class="flex flex-col w-full max-w-xl shadow-2xl border overflow-hidden rounded-xl bg-zinc-700 border-zinc-800">
            <div class="mx-4 text-center items-center justify-center">
                <div class="mt-2 flex">
                    <div class="flex w-full justify-between">
                        <span class="font-bold text-white text-4xl">Produtos</span>
                        <div class="flex items-center">


                            <button type="button" id="dropdownDefault" data-dropdown-toggle="dropdown" class="mr-5 inline-flex text-orange-500 hover:text-orange-400 text-lg">Tabelas<svg class="h-6 w-6 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg></button>


                            <div id="dropdown" class="z-10 hidden bg-zinc-900 rounded-md shadow w-44" data-popper-placement="bottom" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(583px, 681px);">
                                <ul class="my-2 text-sm text-zinc-300" aria-labelledby="dropdownDefault">
                                    <li>
                                        <a href="/" class="text-left block px-4 py-2 hover:bg-zinc-800">Produto</a>
                                    </li>
                                    <li>
                                        <a href="/categoria" class="text-left block px-4 py-2 hover:bg-zinc-800">Categorias</a>
                                    </li>
                                </ul>
                            </div>


                            <span class="text-blue-500 hover:text-blue-400"><a href="/cadastrar-produto" class="flex text-lg">Novo<svg class="ml-1 file:h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                    </svg></a><span>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center items-center flex-col mt-8">
                    <div class="relative overflow-x-auto">
                        <table class="justify-between text-left text-sm text-zinc-300">
                            <thead class="w-bg-zinc-800 text-base text-white uppercase">
                                <tr class="font-extrabold">
                                    <th scope="col" class="px-6">Produtos</th>
                                    <th scope="col" class="px-6">Categoria</th>
                                    <th scope="col" class="px-6">Valor</th>
                                    <th scope="col" class="px-6">Estoque</th>
                                    <th scope="col" class="px-6">
                                        <span class="sr-only">Editar/Excluir</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produtos as $produto)
                                <tr class="w-full truncate">
                                    <th scope="row" class="px-6 py-4 font-medium text-zinc-100 uppercase">{{$produto -> nome}}</th>
                                    <td class="px-6 py-4">{{$produto -> categoria_id}}</td>
                                    <td class="px-6 py-4">{{$produto -> valor}}</td>
                                    <td class="px-6 py-4">{{$produto -> estoque}}</td>
                                    <td class="px-6 py-4 text-right flex">
                                        <button type="button" class="text-green-500 rounded-md hover:text-green-400" onclick="toggleModal('{{$produto -> id}}')">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </button>
                                        <button type="button" class="text-red-500 rounded-md hover:text-red-400" onclick="deletarProduto('{{$produto -> id}}')">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="modal" class="bg-black min-h-screen w-full fixed top-0 left-0 bg-opacity-20 justify-center items-center hidden">
        <form id="form" class="bg-zinc-700 border-zinc-800 w-full max-w-xl rounded-xl px-4" method="POST">
            @csrf
            <label class="text-white block text-base font-bold my-2" for="lblNome">
                Nome:
            </label>
            <input id="nomeInput" value="" class="bg-zinc-800 mb-3 border-zinc-700 shadow appearance-none border rounded w-full py-2 px-3 text-zinc-300 leading-tight focus:outline-none focus:shadow-outline" name="nome" type="text">
            <label class="text-white block text-base font-bold my-2" for="lblCategoria">
                Categoria:
            </label>
            <input id="categoriaInput" value="" class="bg-zinc-800 mb-3 border-zinc-700 shadow appearance-none border rounded w-full py-2 px-3 text-zinc-300 leading-tight focus:outline-none focus:shadow-outline" name="categoria_id" type="text">
            <label class="text-white block text-base font-bold my-2" for="lblValor">
                Valor:
            </label>
            <input id="valorInput" value="" class="bg-zinc-800 mb-3 border-zinc-700 shadow appearance-none border rounded w-full py-2 px-3 text-zinc-300 leading-tight focus:outline-none focus:shadow-outline" name="valor" type="text">
            <label class="text-white block text-base font-bold my-2" for="lblQuantidade">
                Quantidade:
            </label>
            <input id="estoqueInput" value="" class="bg-zinc-800 border-zinc-700 mb-4 shadow appearance-none border rounded w-full py-2 px-3 text-zinc-300 leading-tight focus:outline-none focus:shadow-outline" name="estoque" type="text">
            <div class="flex items-center justify-around">
                <a href="/">
                    <button type="button" class="shadow m-2 bg-red-600 hover:bg-red-800 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" onclick="toggleModal()">
                        Voltar
                    </button>
                </a>
                <button type="submit" class="shadow ml-3 m-2 bg-blue-600 hover:bg-blue-800 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
                    Editar
                </button>
            </div>
    </div>
    </div>
    </form>
    </div>

    <script>
        async function toggleModal(id = null) {

            const form = document.getElementById("form")
            form.action = `/editar-produto/${id}`

            const res = await fetch(`/editar-produto/${id}`)
            const {
                nome,
                categoria_id,
                valor,
                estoque
            } = await res.json()

            const nomeInput = document.getElementById('nomeInput')
            nomeInput.value = nome

            const categoriaInput = document.getElementById('categoriaInput')
            categoriaInput.value = categoria_id

            const valorInput = document.getElementById('valorInput')
            valorInput.value = valor

            const estoqueInput = document.getElementById('estoqueInput')
            estoqueInput.value = estoque

            const modal = document.getElementById('modal')
            modal.classList.toggle('!flex')
        }

        async function deletarProduto(id) {
            const res = await fetch(`/excluir-produto/${id}`)
            window.location.reload()
        }
    </script>

    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>

</body>



</html>