<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Produtos</title>
</head>
<body>

    <h1>Relatório de Produtos</h1>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>QUANTIDADE</th>
                <th>PREÇO</th>
                <th>SETOR</th>
                <th>DESCRIÇÃO</th>
                <th>AÇÕES</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($produtos as $produto)
                <tr>
                    <td>{{ $produto->id }}</td>
                    <td>{{ $produto->nome }}</td>
                    <td>{{ $produto->quantidade }}</td>
                    <td>R$ {{ $produto->preco }}</td>

                    <td>{{ $produto->setor->nome ?? 'Sem setor' }}</td>

                    <td>{{ $produto->detalhe->descricao ?? 'Sem detalhe' }}</td>

                    <td>
                        <a href="{{ route('produto.atualizar', $produto->id) }}">
                            Atualizar
                        </a>
                        <form action="#" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Deletar</button>
                        </form>
                    </td>
                </tr>
            @empty 
                <tr>
                    <td colspan="7">Nenhum produto encontrado</td>
                </tr>
            @endforelse 
        </tbody>
    </table>

</body>
</html>