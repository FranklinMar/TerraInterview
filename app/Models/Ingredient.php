<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    //public $timestamps = false;

    protected $primaryKey = 'id';
    protected $guarded = [];

    protected $fillable = [
      'name',
      'description',
      'price' // Price per unit
    ];
    
    public function recipies() {
      return $this->hasMany(Quantity::class, 'id');
    }
}
