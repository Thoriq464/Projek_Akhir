<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kosakata extends Model
{
    use HasFactory;

    protected $fillable = ['kata_jawa', 'kata_indonesia', 'contoh_kalimat', 'contoh_kalimat_id', 'jenis_kata'];
}
