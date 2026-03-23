<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>atualizar Produto</title>
</head>
<body>
    <h1>Atualizar Produto</h1>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif
    
    <form action="">
         @csrf
            @method('PUT')

            <input type="text" name="produto"
            value="{{ old('produto', $produto->produto)}}" required>
        
            <input type="text" name="quantidade"
         value="{{ old('quantidade',$produto->quantidade)}}" required>

         <input type="text" name="preco"
         value="{{ old('preco',$produto->preco)}}" required>
        <button type="submit">Atualizar</button>
    </form>

    @if($erros->any())
        <div style="color:brown">
            <ul>
                @foreach ($erros->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>