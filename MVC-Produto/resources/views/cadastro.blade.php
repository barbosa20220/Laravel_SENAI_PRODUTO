<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadatro Usuarios</title>
</head>
<body>
    <h1>Cadatro Usuarios</h1>

    @if(session('succes'))
        <p style="color:green">{{ session('succes')}}</p>
    @endif

    <form action="{{route('produto.salvar') }}" method="POST">
        @csrf
        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome" placeholder="Nome..."
            require value="{{ old('nome')}}"
        >
        <br><br>
        <label for='quantidade'>Quantidade: </label>
        <input type="quantidade" name="quantidade" id="quantidade" placeholder="quantidade..."
            required value="{{ old('quantidade')}}"
        >
        <br><br>
        <label for='preco'>Preco: </label>
        <input type="preco" name="preco" id="preco" placeholder="preco..."
            required value="{{ old('preco')}}"
        >
        <input type="submit" value="cadastrar">
    </form>

    @if($errors->any())
        <div style="color: red">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }} </li>
                @endforeach
            </ul>
        </div>
    @endif
</body>
</html>