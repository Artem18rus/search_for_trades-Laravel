<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoLot extends Model
{
    use HasFactory;
    protected $table = 'info_lots';
    protected $guarded = false;
}
