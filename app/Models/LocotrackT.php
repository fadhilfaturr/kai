<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocotrackT extends Model
{
    use HasFactory;
    protected $table = "locotrack_t";
    protected $fillable = [
        'unit',
        'inventaris',
        'user',
        'tanggal_rencana',
        'tanggal_relasasi',
    ];
}
