<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Yazar extends Model
{
    protected $table = "yazars";
    protected  $fillable = ['name','selflink','image','bio','created_at','updated_at']; 

    static function getField($id, $field){
        $c = Yazar::where('id', '=', $id)->count();
        if($c!=0){
            $w = Yazar::where('id', '=', $id)->get();
            return $w[0][$field];
        }
        else{
            return "Silinmiş Yazar";
        }
    }
}
