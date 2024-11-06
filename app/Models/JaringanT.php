<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JaringanT extends Model
{
    use HasFactory;
    protected $table = "jaringan_t";
    protected $fillable = [
        'unit',
        'inventaris',
        'user',
        'tanggal_rencana',
        'tanggal_relasasi',
    ];
}