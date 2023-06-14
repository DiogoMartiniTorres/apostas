<?php

namespace App\Http\Controllers;

use App\Models\Apostas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApostasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        // Recuperar as apostas do usuário
        $apostas = Apostas::with('Users')->where('user_id', $user->id)->get();

        // Preparar os dados para o gráfico
        $totalVitorias = $apostas->where('status', 'ganhou')->sum('valor');
        $totalDerrotas = $apostas->where('status', 'perdeu')->sum('valor');

        return view('modules.lista', compact('apostas', 'totalVitorias', 'totalDerrotas'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('modules.formulario');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Apostas $apostas)
    {
        $betAmount = $request->input('valor');
        $result = rand(0, 1);
        if ($result > 0.6) {
            // O usuário ganhou a aposta
            $apostas = new Apostas();
            $apostas->fill($request->all());
            $apostas->status = 'ganhou';
            $apostas->user_id = Auth::id();
            // Multiplica o valor da aposta por 3 e atribui ao campo 'valor' do modelo
            $apostas->valor = $betAmount * 3;
            $apostas->save();
            // Adicione a lógica para atualizar o saldo do usuário
            return redirect()->route('success')->with('message', 'Parabéns! Você ganhou a aposta!');
        } else {
            // O usuário perdeu a aposta
            $apostas = new Apostas();
            $apostas->fill($request->all());
            $apostas->status = 'perdeu';
            $apostas->user_id = Auth::id();
            // Atribui o valor da aposta ao campo 'valor' do modelo
            $apostas->valor = $betAmount;
            $apostas->save();
            // Adicione a lógica para atualizar o saldo do usuário
            return redirect()->route('error')->with('message', 'Que pena! Você perdeu a aposta.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function success(){
        return view('modules.success');
    }

    public function error(){
        return view('modules.error');
    }
}
