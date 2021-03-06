<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $livros = Livro::orderBy('titulo')->get();
        $emprestimos = DB::table('emprestimos')->get();

        foreach ($livros as $l) {
            foreach ($emprestimos as $e) {
                if($e->livro_id == $l->id and $e->ativo == 1) {
                    DB::table('livros')->where('id', $l->id)->update(['emprestado' => 1]);
                }
            }
        }

        $livros = Livro::orderBy('titulo')->paginate(15);
        return view('livros.index', ['livros' => $livros]);
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
        Livro::create($request->all());
        session()->flash('mensagem', 'Livro cadastrado com sucesso!');
        return redirect()->route('livros.index');
    }

    public function fetchBook()
    {
        $books = Livro::all();
        return response()->json([
            'books'=>$books,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Livro  $livro
     * @return \Illuminate\Http\Response
     */
    public function show(Livro $livro)
    {
        return view('livros.show', ['livros' => $livro]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Livro  $livro
     * @return \Illuminate\Http\Response
     */
    public function edit(Livro $livro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Livro  $livro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Livro $livro)
    {
        $livro->fill($request->all());
        $livro->save();

        session()->flash('mensagem', 'Livro atualizado com sucesso!');
        return redirect()->route('livros.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Livro  $livro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Livro $livro)
    {
        $livro->delete();
        session()->flash('mensagem', 'Livro exclu??do com sucesso!');
        return redirect()->route('livros.index');
    }
}
