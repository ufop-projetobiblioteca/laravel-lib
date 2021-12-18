<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $fillable = ['codigo', 'titulo', 'autor',  'edicao', 'estante', 'prateleira', 'emprestado'];

    // UMA instância de livro -> possui N empréstimos
    public function emprestimo()
    {
        return $this->hasMany(Emprestimo::class);
    }

    // UMA instância de livro -> possui N reservas
    public function reserva()
    {
        return $this->hasMany(Reserva::class);
    }
}
