<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kitap extends Model
{
    use HasFactory;
    protected $table = "kitaps";
    protected  $fillable = ['id', 'name', 'selflink', 'image', 'yazarid', 'yayineviid', 'fiyat', 'aciklama', 'created_at', 'updated_at']; 
    public function yazar()
    {
        return $this->belongsTo(Yazar::class, 'yazarid');
    }
    public function yayinevi()
    {
        return $this->belongsTo(YayinEvi::class, 'yayineviid');
    }

 
}
