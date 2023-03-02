<?php

namespace App\Models;

use App\Models\Countrie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class State extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function countries(){
        return $this->belongsTo(Countrie::class,'countrie_id');
    }
}
