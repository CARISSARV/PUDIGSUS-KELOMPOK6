<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class relawan extends Model
{
    protected $table='relawan';
    protected $fillable=["nama","generasi","program_studi","foto"];
}

