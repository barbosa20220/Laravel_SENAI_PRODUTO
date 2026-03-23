<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Relatorio de Produtos</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>quantidade</th>
                <th>preco</th>
                <th>Atualizar</th>
                <th>Deletar</th>
            </tr>
        </thead>
        <tdody>
            @forelse ($produtos as $produto)
                <tr>
                    <td>{{ $produto->id }}</td>
                    <td>{{ $produto->nome }}</td>
                    <td>{{ $produto->quantidade }}</td>
                    <td>{{ $produto->preco }}</td>
                    <td> 
                        <a href="{{route('produto.atualizar', $produto->id)}}">Atualizar</a>    
                    </td>
                    <td> Procura Outro Produto </td>
                </tr>
            @empty 
                <tr>
                    <td colspan="4"> Nenhum produto encontrado</tr>
                </tr>
            @endforelse 
        </tdody>
    </table>
</body>
</html>