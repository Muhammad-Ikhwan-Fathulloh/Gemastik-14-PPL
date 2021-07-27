<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solusi extends Model
{
    use HasFactory;

    protected $fillable = [
    	'id_user',
        'id_permasalahan',
        'deskripsi_solusi',
        'deskripsi_penerapan',
        'harapan',
        'file_solusi',
        'file_penerapan',
        'feedback',
        'kategori',
    ];
}
