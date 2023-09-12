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
        'title' => 'required',
        'body' => 'required',
    );
    
    // News Modelに関連付けを行う（【PHP/Laravel】12内で追記）
    public function histories()
    {
        return $this->hasMany('App\Models\History');
    }
}
