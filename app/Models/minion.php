<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class minion extends Model
{
    use HasFactory;
    private $table="minions";
    // protected $primary="id";
    protected $guarded = [];
}
