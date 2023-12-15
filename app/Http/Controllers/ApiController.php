<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ApiController extends Controller
{
    public function atualizarPeso(Request $request)
    {
        $id = $request->input('id');
        $novoPeso = $request->input('peso');

        // Atualize o peso no banco de dados
        $produto = Produto::findOrFail($id);
        $produto->update(['pesoEstoque' => $novoPeso]);

        return response()->json(['message' => 'Peso atualizado com sucesso']);
    }
}
