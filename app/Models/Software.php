<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    use HasFactory;
    protected $table = "software";
    protected $fillable = [
        'unit',
        'id',
        'inventaris',
        'user',
        'tanggal_rencana',
        'tanggal_relasasi',
        'input_form'

    ];
}
