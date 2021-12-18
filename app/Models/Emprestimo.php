<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    use HasFactory;

    protected $fillable = ['aluno_id', 'livro_id', 'renovado', 'ativo'];

    // UMA instância de empréstimo -> pertence a UM usuário
    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }

    // UMA instância de empréstimo -> pertence a UM livro
    public function livro()
    {
        return $this->belongsTo(Livro::class);
    }
}
