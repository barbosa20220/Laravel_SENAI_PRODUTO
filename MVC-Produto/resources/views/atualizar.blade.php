<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Produto</title>
</head>
<body>

    <h1>Atualizar Produto</h1>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('produto.update', $produto->id) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="nome"
        value="{{ old('nome', $produto->nome) }}" required placeholder="Nome">

        <input type="number" name="quantidade"
        value="{{ old('quantidade', $produto->quantidade) }}" required placeholder="Quantidade">

        <input type="text" name="preco"
        value="{{ old('preco', $produto->preco) }}" required placeholder="Preço">

        <select name="setor_id" required>
            <option value="">Selecione o setor</option>
            @foreach ($setores as $setor)
                <option value="{{ $setor->id }}"
                    {{ $produto->setor_id == $setor->id ? 'selected' : '' }}>
                    {{ $setor->nome }}
                </option>
            @endforeach
        </select>

        <h3>Detalhes do Produto</h3>

        <input type="text" name="descricao"
        value="{{ old('descricao', $produto->detalhe->descricao ?? '') }}"
        placeholder="Descrição">

        <input type="date" name="validade"
        value="{{ old('validade', $produto->detalhe->validade ?? '') }}">

        <input type="text" name="fabricante"
        value="{{ old('fabricante', $produto->detalhe->fabricante ?? '') }}"
        placeholder="Fabricante">

        <br><br>
        <button type="submit">Atualizar</button>
    </form>

    @if($errors->any())
        <div style="color:brown">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

</body>
</html>