<?php

namespace App\Models;

use Laravel\Cashier\Billable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Costumer_address extends Model
{
    use HasFactory, Billable;
    protected $guarded=[];

    public function countries(){
        return $this->belongsTo(Countrie::class,'countrie_id');
    }
    public function states(){
        return $this->belongsTo(State::class,'state_id');
    }
    public function cities(){
        return $this->belongsTo(Citie::class,'citie_id');
    }
    public function costomers(){
        return $this->belongsTo(Costomer::class,'costomer_id');
    }
}
