<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'data_nascimento', 'turma', 'email', 'emprestimo_ativo'];

    // UMA instância de usuário -> possui N empréstimos (1 ativo)
    public function emprestimos()
    {
        return $this->hasMany(Emprestimo::class);
    }
}
