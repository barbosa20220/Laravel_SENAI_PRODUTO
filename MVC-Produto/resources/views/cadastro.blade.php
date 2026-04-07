<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
</head>
<body>

    <h1>Cadastro de Produtos</h1>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('produto.salvar') }}" method="POST">
        @csrf

        <label>Nome:</label>
        <input type="text" name="nome" placeholder="Nome..."
        required value="{{ old('nome') }}">
        <br><br>

        <label>Quantidade:</label>
        <input type="number" name="quantidade" placeholder="Quantidade..."
        required value="{{ old('quantidade') }}">
        <br><br>

        <label>Preço:</label>
        <input type="text" name="preco" placeholder="Preço..."
        required value="{{ old('preco') }}">
        <br><br>

        <label>Setor:</label>
        <select name="setor_id" required>
            <option value="">Selecione</option>
            @foreach ($setores as $setor)
                <option value="{{ $setor->id }}">
                    {{ $setor->nome }}
                </option>
            @endforeach
        </select>
        <br><br>

        <h3>Detalhes do Produto</h3>

        <input type="text" name="descricao" placeholder="Descrição">
        <br><br>

        <input type="date" name="validade">
        <br><br>

        <input type="text" name="fabricante" placeholder="Fabricante">
        <br><br>

        <button type="submit">Cadastrar</button>
    </form>

    @if($errors->any())
        <div style="color: red">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

</body>
</html>