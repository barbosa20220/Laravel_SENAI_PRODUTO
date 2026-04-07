<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Setores;
use App\Models\DetalheProduto;

class ProdutoController extends Controller
{
    public function listar()
    {
        $produtos = Produto::with(['setor', 'detalhe'])->get();
        return view('listar', compact('produtos'));
    }

    public function cadastro()
    {
        $setor = Setores::all();
        return view('cadastro', compact('setores'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'quantidade' => 'required|integer',
            'preco' => 'required|numeric',
            'setor_id' => 'required|exists:setors,id',
            'descricao' => 'nullable|string',
            'validade' => 'nullable|date',
            'fabricante' => 'nullable|string'
        ]);

        $produto = Produto::create([
            'nome' => $request->nome,
            'quantidade' => $request->quantidade,
            'preco' => $request->preco,
            'setor_id' => $request->setor_id
        ]);

        DetalheProduto::create([
            'descricao' => $request->descricao,
            'validade' => $request->validade,
            'fabricante' => $request->fabricante,
            'produto_id' => $produto->id
        ]);

        return redirect()->back()->with('success', 'Produto cadastrado com sucesso!');
    }

    public function atualizar($id)
    {
        $produto = Produto::with('detalhe')->findOrFail($id);
        $setor = Setores::all();

        return view('atualizar', compact('produto', 'setores'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'quantidade' => 'required|integer',
            'preco' => 'required|numeric',
            'setor_id' => 'required|exists:setors,id',
            'descricao' => 'nullable|string',
            'validade' => 'nullable|date',
            'fabricante' => 'nullable|string'
        ]);

        $produto = Produto::findOrFail($id);

        $produto->update([
            'nome' => $request->nome,
            'quantidade' => $request->quantidade,
            'preco' => $request->preco,
            'setor_id' => $request->setor_id
        ]);

        if ($produto->detalhe) {
            $produto->detalhe->update([
                'descricao' => $request->descricao,
                'validade' => $request->validade,
                'fabricante' => $request->fabricante
            ]);
        } else {
            DetalheProduto::create([
                'descricao' => $request->descricao,
                'validade' => $request->validade,
                'fabricante' => $request->fabricante,
                'produto_id' => $produto->id
            ]);
        }

        return redirect()->back()->with('success', 'Produto atualizado com sucesso!');
    }
}