<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use App\Models\Costomer;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    use Notifiable;
    protected $guarded=[];
    public function categories(){
        return $this->belongsTo(Categorie::class,'categorie_id');
    }
    public function products(){
        return $this->belongsTo(Product::class,'product_id');
    }
    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function costomers(){
        return $this->belongsTo(Costomer::class,'costomer_id');
    }
}
