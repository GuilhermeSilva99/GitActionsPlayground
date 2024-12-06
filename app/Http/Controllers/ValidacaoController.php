<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValidacaoController extends Controller
{
    public function validar(Request $request)
    {
        $validated = $request->validate([
            'cpf' => 'required|cpf',
            'email' => 'required|email',
            'telefone' => 'required|regex:/^\(?\d{2}\)?\s?\d{4,5}-?\d{4}$/',
            'cep' => 'required|regex:/^\d{5}-?\d{3}$/',
        ]);

        return response()->json(['success' => 'Dados válidos!', 'dados' => $validated]);
    }
}
