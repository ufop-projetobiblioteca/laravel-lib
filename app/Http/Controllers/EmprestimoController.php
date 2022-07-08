<?php

namespace App\Http\Controllers;

use App\Models\Emprestimo;
use App\Models\Aluno;
use App\Models\Livro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmprestimoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emprestimos = Emprestimo::orderBy('aluno_id')->paginate(15);
        $alunos = Aluno::orderBy('nome')->get();
        $livros = Livro::orderBy('titulo')->get();
        return view('emprestimos.index', ['emprestimos' => $emprestimos, 'alunos' => $alunos, 'livros' => $livros]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $livro_id = $request->input('livro_id');
        DB::table('livros')->where('id', $livro_id)->update(['emprestado' => 1]);
        Emprestimo::create($request->all());
        session()->flash('mensagem', 'Empréstimo realizado com sucesso!');
        return redirect()->route('emprestimos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Emprestimo  $emprestimo
     * @return \Illuminate\Http\Response
     */
    public function show(Emprestimo $emprestimo)
    {
        return view('emprestimos.show', ['emprestimos' => $emprestimo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Emprestimo  $emprestimo
     * @return \Illuminate\Http\Response
     */
    public function edit(Emprestimo $emprestimo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Emprestimo  $emprestimo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Emprestimo $emprestimo)
    {
        $emprestimo->fill($request->all());
        $emprestimo->save();
        session()->flash('mensagem', 'Empréstimo alterado com sucesso!');
        return redirect()->route('emprestimos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Emprestimo  $emprestimo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Emprestimo $emprestimo)
    {
        $livro_id = $emprestimo->livro_id;
        DB::table('livros')->where('id', $livro_id)->update(['emprestado' => 0]);
        $emprestimo->delete();
        session()->flash('mensagem', 'Empréstimo excluído com sucesso!');
        return redirect()->route('emprestimos.index');
    }
}
