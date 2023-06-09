<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $table = 'ingredients';

    public $timetstamps = false;
    const UPDATED_AT = null;
    const CREATED_AT = null;
    //public $timestamps = false;

    protected $primaryKey = 'id';
    protected $guarded = [];

    protected $fillable = [
      'name',
      'measure',
      'price' // Price per unit
    ];
    
    public function quantities() {
      return $this->hasMany(Quantity::class, 'ingredient_id');
    }
}
