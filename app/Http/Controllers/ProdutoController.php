<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;

class ProdutoController extends Controller
{

    /**
     * Carrega a listagem de dados.
     */
    public function index()
    {
        $produto = Produto::all();

        return view('produtos.index')->with(['produto' => $produto]);

    }

    /**
     * Carrega o formulário.
     */
    public function create()
    {
        $produto = Produto::all();
        $categoria = Categoria::orderBy('nome')->get();

        return view('produtos.form')->with(['categoria' => $categoria, 'produto' => $produto]);

    }

    /**
     * Salva os dados do formulário.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
            'preco' => 'required|numeric',
            'quantidade' => 'required|integer',
            'limitePeso' => 'required|numeric',
            'validade' => 'required|date',
            'categoria_id' => 'required|integer',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $produto = Produto::create($request->all());


         // Upload da imagem, se fornecida
         if ($request->hasFile('imagem')) {
            $imagemPath = $request->file('imagem')->store('imagens/produto');
            $produto->update(['imagem' => $imagemPath]);
        }

        return redirect('produtos')->with('success', "Cadastrado com sucesso!");
    }

    /**
     * Carrega apenas 1 registro da tabela.
     */
    public function show($id)
    {
        $produto = Produto::findOrFail($id);
        return view('produtos.show')->with(['produto' => $produto]);

    }

    /**
     * Carrega o formulário para edição.
     */
    public function edit($id)
    {
        $produto = Produto::find($id);
        $categoria = Categoria::orderBy('nome')->get();


        return view('produtos.form')->with(['produto' => $produto, 'categoria' => $categoria]);
    }

    /**
     * Atualiza os dados do formulário.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
            'preco' => 'required|numeric',
            'quantidade' => 'required|integer',
            'limitePeso' => 'required|numeric',
            'validade' => 'required|date',
            'categoria_id' => 'required|integer',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $produto = Produto::findOrFail($id);
        $produto->update($request->all());

        // Upload da nova imagem, se fornecida
        if ($request->hasFile('imagem')) {
            $imagemPath = $request->file('imagem')->store('imagens/produtos');
            $produto->update(['imagem' => $imagemPath]);
        }
        return redirect('produtos')->with('success', "Atualizado com sucesso!");
    }

    /**
     * Remove o registro do banco de dados.
     */
    public function destroy($id)
    {
        $produto = Produto::find($id);
        $produto->delete();
        return redirect('produtos')->with('success', "Removido com sucesso!");
    }
    public function search(Request $request)
    {

        if (!empty($request->value)) {

            $produto = Produto::where($request->type, 'like', "%" . $request->value . "%")->get();
        } else {
            $produto = Produto::all();
        }
        return view('produto.index')->with(['produto' => $produto]);

    }
}
