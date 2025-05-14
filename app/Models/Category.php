<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory; 

    protected $fillable = [ // Menentukan kolom yang boleh diubah
        'user_id', 
        'title']; 

        
    // Relasi ke User (pemilik kategori)
    public function user()
    {
        return $this->belongsTo(User::class); // Kategori dimiliki oleh satu User
    }

    // Relasi ke Todos (kategori memiliki banyak todo)
    public function todos()
    {
        return $this->hasMany(Todo::class); // Kategori memiliki banyak Todo
    }
}
