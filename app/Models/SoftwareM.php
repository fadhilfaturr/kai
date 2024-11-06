<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoftwareM extends Model
{
    use HasFactory;
    protected $table = "software_m";
    protected $fillable = [
        'unit',
        'inventaris',
        'user',
        'tanggal_rencana',
        'tanggal_relasasi',
    ];
}
