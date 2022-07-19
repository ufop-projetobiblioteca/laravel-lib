<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
        $date = Carbon::now()->toDateString();
        $emprestimos = DB::table('emprestimos')->get();

        foreach ($emprestimos as $e) {
            if ($e->devolucao < $date) {
                DB::table('emprestimos')->where('id', $e->id)->update(['em_atraso' => 1]);
            } 
            else {
                DB::table('emprestimos')->where('id', $e->id)->update(['em_atraso' => 0]);
            }

        }

        $emprestimos = Emprestimo::orderBy('aluno_id')->paginate(15);
        $alunos = Aluno::orderBy('nome')->get();
        $livros = Livro::orderBy('titulo')->get();
        return view('emprestimos.index', ['emprestimos' => $emprestimos, 'alunos' => $alunos, 'livros' => $livros]);
    }

    public function historico()
    {
        $emprestimos = Emprestimo::orderBy('aluno_id')->paginate(15);
        $alunos = Aluno::orderBy('nome')->get();
        $livros = Livro::orderBy('titulo')->get();
        return view('emprestimos.historico', ['emprestimos' => $emprestimos, 'alunos' => $alunos, 'livros' => $livros]);
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
        $status = DB::table('livros')->where('id', $request->livro_id)->value('emprestado');
        if($status) {
            session()->flash('mensagemErro', 'Este livro não está disponível!');
            return redirect()->route('emprestimos.index');
        }

        $devolucao = $request->devolucao;
        $date = Carbon::now()->toDateString();

        if ($devolucao >= $date) {
            Emprestimo::create($request->all());
    
            $livro_id = $request->input('livro_id');
            $aluno_id = $request->input('aluno_id');
    
            DB::table('livros')->where('id', $livro_id)->update(['emprestado' => 1]);
            DB::table('alunos')->where('id', $aluno_id)->increment('emprestimos_ativos', 1);
    
            session()->flash('mensagem', 'Empréstimo realizado com sucesso!');
            return redirect()->route('emprestimos.index');
        } else {
            session()->flash('mensagemErro', 'Insira uma data válida!');
            return redirect()->route('emprestimos.index');
        }
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
        $date = Carbon::now()->toDateString();
        $devolucao = $request->devolucao;
        $em_atraso = $request->em_atraso;
        $id = $request->id;
        $livro_id = $request->livro_id;
        $ativo = $request->flag;

        if ($em_atraso == 1) {
            session()->flash('mensagemErro', 'Não é possível renovar empréstimos em atraso!');
            return redirect()->route('emprestimos.index');
        }

        if ($ativo == 0) {
            DB::table('emprestimos')->where('id', $id)->update(['ativo' => 0, 'devolucao' => $date]);
            DB::table('livros')->where('id', $livro_id)->update(['emprestado' => 0]);
            $emprestimo->save();
            session()->flash('mensagem', 'Empréstimo devolvido com sucesso!');
            return redirect()->route('emprestimos.index');
        }

        if ($devolucao >= $date) {
            $emprestimo->fill($request->all());
            $emprestimo->save();
            session()->flash('mensagem', 'Empréstimo renovado com sucesso!');
            return redirect()->route('emprestimos.index');
        } else {
            session()->flash('mensagemErro', 'Insira uma data válida!');
            return redirect()->route('emprestimos.index');
        }

        session()->flash('mensagemErro', 'Erro ao renovar empréstimo!');

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
