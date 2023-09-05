<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    // 以下を【PHP/Laravel】09内で追記
    protected $guarded = array('id');

    public static $rules = array(
        'title' => 'required|unique:news|max:255',
        'body' => 'required',
    );
}
