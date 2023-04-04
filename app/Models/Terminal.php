<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terminal extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    const TIPE_TERMINAL = "TERMINAL";
    const TIPE_CHECKPOINT = "CHECKPOINT";
    const TIPE_PUL = "PUL";
}
