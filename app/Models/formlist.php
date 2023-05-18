<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formlist extends Model
{
    use HasFactory;
    protected $table = 'image';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'image'];
}

