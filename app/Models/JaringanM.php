<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JaringanM extends Model
{
    use HasFactory;
    protected $table = "jaringan_m";
    protected $fillable = [
        'unit',
        'inventaris',
        'user',
        'tanggal_rencana',
        'tanggal_relasasi',
    ];
}
