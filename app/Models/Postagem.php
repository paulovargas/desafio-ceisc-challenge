<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postagem extends Model
{
    use HasFactory;

    public static function search($search)
    {
        return self::where('titulo', "like", "%{$search}%")
        ->orWhere('', "like", "%{$search}%")
        ->with([])
        ->paginate(3);
    }
}
